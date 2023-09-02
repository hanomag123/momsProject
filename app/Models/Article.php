<?php

namespace App\Models;

use App;
use App\Filters\QueryFilter;
use App\Helper\Helper;
use App\Services\ImageResizer;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Article extends Model
{
  use HasFactory;
  use Sluggable;

  public function articleTranslations(): HasMany
  {
    return $this->hasMany(ArticleTranslation::class);
  }

  
  public function sluggable(): array
  {
    return [
      'slug' => [
        'source' => ['title']
      ]
    ];
  }


  public function scopeLocal($query)
  {
    $local = Locale::where('name', App::getLocale())->first();

    if (isset($local)) {
      return $query->where('locale_id', $local['id']);
    } else {
      Helper::setLocale(config('app.fallback_locale'));
      $local = Locale::where('name', App::getLocale())->first();
      return $query->where('locale_id', $local['id']);
    }
  }

  public function scopeFilter(Builder $builder, QueryFilter $filter) {
    return $filter->apply($builder);
  }

  public function getPreviewBlogAttribute () { 
    return (new ImageResizer())->generatePreviews($this->image, $this->slug, 374, 325, 'posts');
  }
}
