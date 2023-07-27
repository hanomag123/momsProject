<?php

namespace App\Http\Controllers;

use App;
use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Language;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index () {
      

      $articles=[];
      $images=[];

      foreach(Article::all() as $article) {
        $images[] = $article->image;
        $articles[] = Article::local($article)->first();
      }

      return view('articles', compact('articles', 'images'));

    } 

    public function show($slug) {
      return view('article');
    }


    
}
