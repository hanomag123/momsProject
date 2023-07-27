<?php
namespace App\Helper;

use App\Models\Language;

class Helper
{
  public static function setLocale($locale)
  {
    if (!in_array($locale, Language::pluck('name')->toArray())) {
      abort(404);
    }
    session(['user_locale' => $locale]);
    return redirect()->back();
  }
}
?>