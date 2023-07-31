<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\MainBlock;
use Illuminate\Support\Facades\App;

class MainController extends Controller
{
  public function index()
  {

    $local = Language::where('name', App::getLocale())->first();

    if (isset($local)) {

      $mainBlock = MainBlock::where('language_id', $local['id'])->first();

      return view('main', compact('mainBlock'));

    } else {
      Helper::setLocale(config('app.fallback_locale'));
    }

  }

  public function aboutus() {
    return view('aboutus');
  }

  public function oneWindow($slug) {
    dd($slug);
    return view('onewindow');
  }


}
