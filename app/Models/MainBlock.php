<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MainBlock extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $guarded = [];

    public function language(): BelongsTo {
      return $this->belongsTo(Locale::class);
    }

    public function image(): BelongsTo {
      return $this->belongsTo(Image::class);
    }
}
