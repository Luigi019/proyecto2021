<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ContactUs;


class ContactController extends Controller
{
    public function sendMail( Request $request){
        $to = ["webinmobiliaria3@gmail.com", "deifelmusic@gmail.com"];
        \Meta::set('og:site_name:', 'Contactanos');
        \Meta::set('description', 'Contatanos');
        for($i = 0 ; $i < count($to) ; $i++)
        {
            Notification::route('mail', $to[$i])->notify(new ContactUs($request));
        }
        return back()->with('message', 'Nos contacto exitosamente, pronto nos pondremos en contacto con usted!')->with('type','success');
    }
}
