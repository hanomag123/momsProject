<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\MainBlock;
use Illuminate\Http\Request;
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
      $this->setLocale('ru');
    }

  }

  public function setLocale($locale)
  {
    if (!in_array($locale, Language::pluck('name')->toArray())) {
      abort(404);
    }
    session(['user_locale' => $locale]);
    return redirect()->back();
  }
}
