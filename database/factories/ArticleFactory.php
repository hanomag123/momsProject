<?php

namespace Database\Factories;

use App\Models\Locale;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
  public $numb = 0;
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    $title = 'рус' . $this->faker->sentence(5);

    return [
      'image' => '/images/news/news-1.jpg',
      'date' => $this->faker->dateTimeBetween('-10 years', 'now'),
      'title' => $title,
      'content' => $this->faker->sentence(10),
      'locale_id' => 1,
    ];
  }
}
