<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\Locale;
use App\Models\MainBlock;
use App\Models\Preference;
use Illuminate\Support\Facades\App;

class MainController extends Controller
{
  public function index()
  {

    $local = Locale::where('name', App::getLocale())->first();
    $preferences = Preference::all();

    if (isset($local)) {

      $mainBlock = MainBlock::where('locale_id', $local['id'])->first();

      return view('main', compact('mainBlock','preferences'));

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
