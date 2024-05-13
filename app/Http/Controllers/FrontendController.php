<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class FrontendController extends Controller
{




public function search(Request $request){
 
    $q = $request->q;
    $service = Service::where('title','like' ,'%'.$q.'%')->first();

    if($service){
        return view('front.pages.service_single',compact('service'));
    }else{
        return redirect()->back()->with('error', __('ERROR!') );
    }

}


    public function contact(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application|null
    {
        return view('front.pages.contact');
    }


    public function contact_send(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
            'phone' => 'required',
        ]);
        $dArr = [
            '{form_name}' => $request->name,
            '{form_email}' => $request->email,
            '{form_message}' => $request->message,
            '{form_phone}' => $request->phone,
        ];
        $resp = Utility::sendEmailTemplate('Contact', 'aga.mustafayevvv@gmail.com', $dArr);
        return redirect()->back()->with('success', __('Page Successfully added!') );

    }


    




    public function subscription(Request $request){
        $subs = new Subscription();
        $subs->email = $request->email;
        $subs->save();

        return redirect()->back()->with('success', __('Successfully Subscription') );
    }

    public function appointment(Request $request){

        $appointment = new Appointment();
        
        $appointment->name = $request->name;
        $appointment->company = $request->company;
        $appointment->employee = $request->employee;
        $appointment->busines = $request->busines;
        $appointment->phone = $request->phone;
        $appointment->desc = $request->desc;
        $appointment->email = $request->email;
        $appointment->save();

        return redirect()->back()->with('success', __('Successfully Sended Message') );
    }





    public function contactForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'subject' => 'required',
            'name' => 'required',
            'desc' => 'required',

        ]);

        $subscription = new ContactForm();
        $subscription->email      = $request->email;
        $subscription->desc      = $request->desc;
        $subscription->name      = $request->name;
        $subscription->subject      = $request->subject;
        $subscription->save();

        return redirect()->back()->with('success', __('Mesajınız uğurla göndərildi') );
    }

}
