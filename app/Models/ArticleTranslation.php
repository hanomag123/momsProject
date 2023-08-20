<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ArticleTranslation extends Model
{
  use HasFactory;
  use Sluggable;

  protected $fillable = ['article_id', 'language_id'];

  public function sluggable(): array
  {
    return [
      'slug' => [
        'source' => ['title']
      ]
    ];
  }

  public function article ():BelongsTo { 
    return $this->belongsTo(Article::class);
  }

}
