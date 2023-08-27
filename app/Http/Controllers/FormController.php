<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\FeedbackMail;
use App\Models\Form;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FormController extends Controller
{
    public function index (Request $request) { 
      $name = $request->name;
      $tel = $request->tel;

      Mail::to(env('MAIL_TO'))->send(new FeedbackMail(compact('name', 'tel')));
      Form::create(compact('name', 'tel'));
      
      return response()->json([
        'name' => $name,
        'tel' => $tel,
        'success' => true,
      ]);
    }
}
