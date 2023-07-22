<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MainBlock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class MainController extends Controller
{
  public function index()
  {
    // $mainBlock = MainBlock::byLocale()->all();
    // dd($mainBlock);

    return view('main');
  }

  public function setLocale($locale)
  {
    session(['user_locale' => $locale]);
    return redirect()->back();
  }

  public function scopeLocale(\Illuminate\Database\Eloquent\Builder $query){
    return $query->select([
      'id', 
      'title-' . App::getLocale() . ' as title', 
      'intro-' . App::getLocale() . ' as intro', 
      'photo'
      ]);
  }
}
