<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleTranslation;
use App\Filters\ArticleFilter;

class ArticleController extends Controller
{
  public function index(ArticleFilter $filter)
  {
    $paginate = Article::orderBy('date', 'desc')->filter($filter)->paginate(8);
    $articles = [];
    $minYear = explode('-', Article::min('date'));

    foreach ($paginate as $article) {
      $elem = Article::local($article)->first();
      $elem->image = $article->image;
      $elem->date = $article->date;
      $articles[] = $elem;
    }

    return view('articles', compact('articles', 'paginate', 'minYear'));
  }

  public function show($slug)
  {
    $article = ArticleTranslation::with('article')->where('slug', $slug)->first();

    return view('article', compact('article'));
  }

  public function events(ArticleFilter $filter) {
    $paginate = Article::orderBy('date', 'desc')->with('articleTranslations')->filter($filter)->paginate(8);
    $articles = [];
    $minYear = explode('-', Article::min('date'));

    foreach ($paginate as $article) {
      $elem = Article::local($article)->first();
      $elem->image = $article->image;
      $elem->date = $article->date;
      $articles[] = $elem;
    }
    
    return ['items' => $articles, 'paginate' => $paginate];
  }


  public function vueIndex(ArticleFilter $filter)
  {
    return view('articlesVue');
  }
}
