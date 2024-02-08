<?php

namespace App\Http\Controllers;
use Illuminate\Http\Response;

use App\Http\Controllers\Auth;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Reserva;
use App\Models\Evento;


use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Http\Request;

class AdminController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $rol =\Auth::user()->role;
        
        if($rol == 'admin'){
            $user=\Auth::user();
            $users = User::wherenot('id',$user->id)->paginate(10);
            
            return view('edit-role',compact('users'))->with('users', $users)->with(['a'=>""]);
        }
        else{
            return view('error');
        }
    }


    public function getavatar($id)
    {
        
        $users= User::all();

        foreach($users as $user){
            if($id==$user->id){
                $filename=$user->image;
                $nom=$user->name;
            }
        };
        
        $file=Storage::disk('users')->get($filename);
        return new Response($file,200);

        
    }

    
    public function update(Request $request, $id)
{
    $rol =\Auth::user()->role;
    
    if($rol == 'admin'){
        $users2= User::all();

        $user=\Auth::user();
        $users = User::wherenot('id',$user->id)->paginate(10);
    
            foreach($users2 as $user2){
                if($id==$user2->id){
                    $role=$request->get('role');
    
                    $validate=$this->validate($request,[
                        'role'=>['required','string','max:255'],
                    ]);
    
    
                    $user2->role=$role;
    
                    $user2->update();
                }
            };
    
        return view('edit-role',compact('users'))->with('users', $users)->with(['a'=>"Se ha editado correctamente"]);
    }
    else{
        return view('error');
    }
}
    public function reservestaules()
        {
            $rol =\Auth::user()->role;
            $users= User::all();

            if($rol == 'admin'){
                $user=\Auth::user();
                $taules = Reserva::all();
                
                return view('edit-reserva')->with('taules', $taules)->with('users', $users)->with(['a'=>""]);
            }
            else{
                return view('error');
            }
        }


    public function updatereserva(Request $request, $id){
        $rol =\Auth::user()->role;
        $users= User::all();

        if($rol == 'admin'){
            $taules= Reserva::all();
        
                foreach($taules as $taula){
                    if($id==$taula->id){
                        $taula->usuario=NULL;
                        $taula->reservat="FALSE";
        
                        $taula->update();
                    }
                };
        
            return view('edit-reserva')->with('taules', $taules)->with('users', $users)->with(['a'=>"Se ha editado correctamente"]);
        }
        else{
            return view('error');
        }
    }

    public function eliminareserva()
    {
        $rol =\Auth::user()->role;
        $users= User::all();

        if($rol == 'admin'){
            $taules= Reserva::all();
        
                foreach($taules as $taula){
                        $taula->usuario=NULL;
                        $taula->reservat="FALSE";
        
                        $taula->update();
                };
        
            return view('edit-reserva')->with('taules', $taules)->with('users', $users)->with(['a'=>"Se ha editado correctamente"]);
        }
        else{
            return view('error');
        }
    }

    public function updateevent(Request $request, $id)
    {
        $rol =\Auth::user()->role;
        $users= User::all();

        if($rol == 'admin'){
            $events= Evento::all();

                foreach($events as $event){
                    if($id==$event->id){
                        $event->delete();
                    }
                };

                $eventos = Evento::orderBy('created_at', 'desc')->paginate(2);

                return view('home',compact('eventos'))->with('eventos', $eventos)->with('users', $users);
        }
        else{
            return view('error');
        }
    }

    public function veureevents()
    {
        $rol =\Auth::user()->role;
        $users= User::all();

        if($rol == 'admin'){
            $user=\Auth::user();
            $events = Evento::all();

            return view('edit-event')->with('events', $events)->with('users', $users)->with(['a'=>""]);
        }
        else{
            return view('error');
        }
    }






}
