<?php
namespace App\Helper;

use App\Models\Locale;

class Helper
{
  public static function setLocale($locale)
  {
    if (!in_array($locale, Locale::pluck('name')->toArray())) {
      abort(404);
    }
    session(['user_locale' => $locale]);
    return redirect()->back();
  }
}
?>