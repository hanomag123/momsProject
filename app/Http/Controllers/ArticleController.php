<?php

namespace App\Http\Controllers;

use App;
use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleTranslation;
use App\Models\Language;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index () {
      

      $articles=[];
      $images=[];
      foreach(Article::paginate(1) as $article) {
        $images[] = $article->image;
        $articles[] = Article::local($article)->first();
      }

      $paginate = Article::paginate(1);

      return view('articles', compact('articles', 'images', 'paginate'));

    } 

    public function show($slug) {
      $article = ArticleTranslation::where('slug', $slug)->first();

      return view('article', compact('article'));
    }


    
}
