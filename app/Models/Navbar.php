<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Navbar extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
      'name', 'route', 'ordering'
  ];
}
