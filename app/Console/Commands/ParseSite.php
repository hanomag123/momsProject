<?php

namespace App\Console\Commands;

use App\Models\Article;
use App\Models\ArticleTranslation;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ParseSite extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'app:parse-site {url}';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Command description';

  /**
   * Execute the console command.
   */
  public function handle()
  {
    $url = $this->argument('url');
    $file_url = Str::afterLast($url, '/');
    $file_url = preg_replace('/\?|&|\./', '', $file_url);

    if (!Str::contains($file_url, '.html')) {
      $file_url = $file_url . '.html';
    }

    $data = $this->get_html_data($url, $file_url);

    if (!$data) {
      return;
    }

    $regExps = [
      [
        'name' => 'title',
        'regExp' => '/<h5>(?<title>.*)<\/h5>/U',
      ],
      [
        'name' => 'date',
        'regExp' => '/class="date">(?<date>.*)</U',
      ],
      [
        'name' => 'content',
        'regExp' => '/<div class="post_content">(?<content>[\s\S\n]+?)<\/div>/',
      ],
    ];
    $arr = [];
    foreach ($regExps as $regExp) {
      $name = $regExp['name'];
      $pattern = $regExp['regExp'];

      preg_match_all($pattern, $data, $matches);

      if (isset($matches[$name][0])) {
        $this->info("$name: " . $matches[$name][0]);
        $arr[$name] = $matches[$name][0];
      } else {
        $this->info("Ошибка с парсингом: $name");
      }
    }
    $article = Article::create(
      [
        'image' => '',
      ]
    );
    ArticleTranslation::create([...$arr, 'article_id' => $article->id, 'locale_id' => 1]);
  }

  public function get_html_data($url, $file_url)
  {

    // пробуем взять содержимое страницы из кэша
    if (Storage::disk('public')->exists($file_url)) {

      $this->line('Файл успешно взят из кэша. ' . Storage::url($file_url));

      return Storage::disk('public')->get($file_url);
    }

    try {

      // если не нашли, запрашиваем страницу с сайта
      $agent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)';

      $ch = curl_init();
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($ch, CURLOPT_VERBOSE, true);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_USERAGENT, $agent);
      curl_setopt($ch, CURLOPT_URL, $url);
      $html = curl_exec($ch);
      curl_close($ch);

      $this->info('Файл успешно создан. ' . Storage::url($file_url));

      sleep(1); // паузы после скачки 1с
      return $html;

    } catch (Exception $e) {
      $this->error('Выброшено исключение: ' . $e->getCode());
      return false;
    }
  }
}
