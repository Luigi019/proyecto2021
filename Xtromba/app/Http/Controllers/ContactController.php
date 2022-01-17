<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Notifications\SupportContact;
use App\Notifications\TeacherContact;
use App\Notifications\StudentToTeacherContact;
use App\Models\User;
use App\Models\RequestToTeacher;

class ContactController extends Controller
{
    public function supportIndex()
    {
        \Meta::set('og:site_name:', 'Contactar a soporte');
        \Meta::set('description', 'Contactar a soporte');
        return view('contactsForms.supportContactForm');
    }
    public function supportContact( Request $request){
        $to = ["info@xtromba.com", "support@xtromba.webanagrama.com"];
        \Meta::set('og:site_name:', 'Contactar a soporte');
        \Meta::set('description', 'Contactar a soporte');
        for($i = 0 ; $i < count($to) ; $i++)
        {
            Notification::route('mail', $to[$i])->notify(new SupportContact($request));
        }
        return back()->with('message', 'Nos contacto exitosamente, pronto nos pondremos en contacto con usted!')->with('type','success');
    }
    public function teacherIndex()
    {
        \Meta::set('og:site_name:', 'Solicitar ser profesor');
        \Meta::set('description', 'Solicitar ser profesor');
        return view('contactsForms.teacherContactForm');
    }
    public function teacherContact( Request $request){
        $requestToTeacher = new RequestToTeacher();

        $requestToTeacher->user_id = $request->userid;
        $requestToTeacher->message = $request->message;
        $requestToTeacher->subject = $request->subject;
        $requestToTeacher->save();
        $to = ["info@xtromba.com", "support@xtromba.webanagrama.com"];
        \Meta::set('og:site_name:', 'Solicitar ser profesor');
        \Meta::set('description', 'Solicitar ser profesor');

        for($i = 0 ; $i < count($to) ; $i++)
        {
            Notification::route('mail', $to[$i])->notify(new TeacherContact(['request' => $request , 'user' => Auth::user()]));
        }
        return back()->with('message', 'Proceso su solicitud exitosamente, pronto nos pondremos en contacto con usted!')->with('type','success');
    }
    public function studentToTeacher( Request $request, User $id){
        \Meta::set('og:site_name:', 'Contactar profesor');
        \Meta::set('description', 'Contactar profesor');
        $user = User::find($id);
        $user->notify(new StudentToTeacherContact($request));

        return back()->with('message', 'Contacto a este profesor correctamente, pronto nos pondremos en contacto con usted!')->with('type','success');
    }
}
