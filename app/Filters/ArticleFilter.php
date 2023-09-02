<?php

namespace App\Filters;

class ArticleFilter extends QueryFilter {

  public function locale($locale = null) {
    return $this->builder->when($locale, function($query) use($locale) {
      $query->where('locale_id', $locale);
    });
  }

  public function year($year=null) {
    return $this->builder->when($year, function($query) use($year) {
      $query->whereYear('date', $year);
    });
  }

  public function month($month = null) {
    return $this->builder->when($month, function($query) use($month) {
      $query->whereMonth('date', $month);
    });
  }

  public function title($title = null) {
    $title = urldecode($title);
    return $this->builder->when($title, function($query) use($title) {
      $query->where('title', 'LIKE', "%{$title}%");
    });
  }



}
