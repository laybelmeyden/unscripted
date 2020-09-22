<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        return view('main');
    }
    public function contact(Request $request)
  {
    
      $to_name = "vrpatriot";
      $to_email = "trycollens@gmail.com";
      $data = array(
          'contact_email' => request('contact_email'),
          'phone' => request('phone'),
          'text_contact' => request('text_contact'),
      );
        \Mail::send('email.mailcontact', $data, function($message) use ($data, $to_email, $to_name)
        {
          $message->from($to_email, $data['name'],$data['phone'], $data['email']);
          $message->to($to_email)->subject('Message from site');
       });
  
      back()->with('message_1', 'Ваш вопрос отправлен куратору конкурса и в ближайшее время мы свяжемся с вами, чтобы ответить на него!');
      return redirect('/')->with('message', 'СПАСИБО ЗА ВАШУ АКТИВНОСТЬ И ИНТЕРЕС!');
  
    }
}
