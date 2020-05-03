<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUs;

class PagesController extends Controller
{
    

     public function index()
    {
        $data = "الصفحة الرئيسية";

        return view("pages.index", compact('data'));
    }

    public function about()
    {
        $data="سوق تاجنانت يرحب بكم";
        $name = "عيسى طراد";
       
        return view("pages.about", compact('data', 'name'));
    }

    public function contact()
    {
       
        return view("pages.contact");
    }
    public function sendMail(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'body' => 'required|min:10'
        ]);
        $name = $request->input('name');
        $email = $request->input('email');
        $subject = $request->input('subject');
        $body = $request->input('body');
        Mail::to('informatiquedz1239@gmail.com')
                ->send(new ContactUs($name, $email, $subject, $body)); 
       
        return redirect("/contact")->with("success","تلقينا رسالتك سنرد عليك في أقرب الآجال");
    }
}
