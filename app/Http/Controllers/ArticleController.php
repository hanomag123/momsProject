<?php

namespace App\Http\Controllers;

use App;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleTranslation;
use App\Filters\ArticleFilter;
use App\Models\Locale;

class ArticleController extends Controller
{
  public function index(ArticleFilter $filter)
  {

    $paginate = Article::local()->orderBy('date', 'desc')->filter($filter)->paginate(8);
    $articles = [];
    $minYear = explode('-', Article::min('date'));

    $articles = $paginate;

    return view('articles', compact('articles', 'paginate', 'minYear'));
  }

  public function show($slug)
  {
    $article = ArticleTranslation::with('article')->where('slug', $slug)->first();

    return view('article', compact('article'));
  }

  public function events(ArticleFilter $filter) {
    $paginate = Article::orderBy('date', 'desc')->filter($filter)->paginate(8);
    $articles = [];
    foreach ($paginate as $article) {
      $articles[] = $article;
    }

    return ['items' => $articles, 'paginate' => $paginate, $_GET];
  }


  public function vueIndex()
  {
    $locale = Locale::where('name', App::getLocale())->first();
    return view('articlesVue', compact('locale'));
  }
}
