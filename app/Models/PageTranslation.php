<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PageTranslation extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function language(): BelongsTo {
      return $this->belongsTo(Language::class);
    }

    public function page():BelongsTo { 
      return $this->belongsTo(Page::class);
    }
}
