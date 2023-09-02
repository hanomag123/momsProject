<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Image extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = ['id'];

    public function mainBlocks(): HasMany {
      return $this->hasMany(MainBlock::class);
    }

    
}
