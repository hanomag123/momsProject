<?php

namespace App\Filters;

class ArticleFilter extends QueryFilter {
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
}
?>