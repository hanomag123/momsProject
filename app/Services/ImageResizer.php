<?php

namespace App\Services;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Image;

class ImageResizer {
  public function generatePreviews($sourse, $slug, $width, $height, $folder = 'common', $withRetina = true) {
    $folder = 'cache/'.$folder;
    if (!File::ensureDirectoryExists($folder)) {
      File::makeDirectory($folder, 0777, true, true);
    }
    $previews = [];
    $newPath = $folder . '/' . $slug;
    $previews['@1x'] = $this->makePreview($sourse, $newPath, $width, $height);
    if ($withRetina) {
      $previews['@2x'] = $this->makePreview($sourse, $newPath, $width * 2, $height * 2);
    }
    return $previews;
  }

  public function makePreview($sourse, $newPath, $width, $height) {
    $format = 'webp';
    $newPath = $newPath . '_' . $width . '_' . $height . ".$format";
    if (File::exists($newPath)) {
      return $newPath;
    }
    $sourse = public_path() . $sourse;
    Image::make($sourse)->fit($width, $height, function ($constraint) {
      $constraint->upsize();
    })->encode($format)->save($newPath);

    return $newPath;
  }
};


?>