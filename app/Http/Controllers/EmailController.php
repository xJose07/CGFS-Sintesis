<?php

namespace App\Http\Controllers;
use Illuminate\Http\Response;

use App\Http\Controllers\Auth;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Reserva;
use App\Models\Evento;
use App\Mail\ReservaMailable;
use App\Mail\ContactMailable;
use Illuminate\Support\Facades\Mail;



use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Http\Request;

class EmailController extends Controller
{

    public function contacto(){
        return view('contacto')->with(['a'=>""]); 
    }


    public function emailreserva(){
        $email =\Auth::user()->email;
        $correo = new ReservaMailable;
        Mail::to($email)->send($correo);
        return view('reserva')->with(['a'=>"Se ha reservado correctamente"]); 
    }

    public function emailcontact(Request $request){

        $request->validate([
            'message'=>'required'
        ]);
        $correo = new ContactMailable($request->all());
        Mail::to('restaurantebola65@gmail.com')->send($correo);
        return view('contacto')->with(['a'=>"Se ha enviado un correo con su mensaje"]); 
    }
}
