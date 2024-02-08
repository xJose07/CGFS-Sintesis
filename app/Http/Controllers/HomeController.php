<?php

namespace App\Http\Controllers;
use Illuminate\Http\Response;

use App\Http\Controllers\Auth;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Evento;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;

use Illuminate\Http\Request;

class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $eventos = Evento::orderBy('created_at', 'desc')->paginate(2);
        $users = User::all();
        
        
        return view('home',compact('eventos'))->with('eventos', $eventos)->with('users', $users);
    }

    public function getimagee($filename)
    {
        $file=Storage::disk('eventos')->get($filename);
        return new Response($file,200);
    }

}
