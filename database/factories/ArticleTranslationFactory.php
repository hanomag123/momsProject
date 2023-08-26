<?php

namespace Database\Factories;

use App\Models\Locale;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ArticleTranslation>
 */
class ArticleTranslationFactory extends Factory
{
  public $numb = 0;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
      $languages = Locale::pluck('id');
        return [
          'title' => (bool) $this->numb ? 'бел' . $this->faker->title() : 'рус' . $this->faker->title ,
          'content' => $this->faker->sentence(10),
          'locale_id' => $languages[$this->numb++],
        ];
    }
}
