<?php

namespace App\Models;

use App;
use App\Filters\QueryFilter;
use App\Helper\Helper;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Article extends Model
{
  use HasFactory;

  public function articleTranslations(): HasMany
  {
    return $this->hasMany(ArticleTranslation::class);
  }


  public function scopeLocal($query, $article)
  {
    $local = Language::where('name', App::getLocale())->first();

    if (isset($local)) {
      return $article->articleTranslations->where('language_id', $local['id']);
    } else {
      Helper::setLocale(config('app.fallback_locale'));
      $local = Language::where('name', App::getLocale())->first();
      return $article->articleTranslations->where('language_id', $local['id']);
    }
  }

  public function scopeFilter(Builder $builder, QueryFilter $filter) {
    return $filter->apply($builder);
  }
}
