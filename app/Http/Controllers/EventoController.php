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

class EventoController extends Controller
{
    public function penja(Request $request)
{
    $rol =\Auth::user()->role;
        
    if($rol == 'admin'){
        return view('penja')->with(['a'=>""]);
    }
    else{
        return view('error');
    }

        
}
public function penjaimg(Request $request)
{
    //$user=\Auth::user();
    //$id =\Auth::user()->id;
    $rol =\Auth::user()->role;
        
    if($rol == 'admin'){
        $new= new Evento();
    
        $title=$request->input('title');
    
        $description=$request->input('description');
        $image = $request->file('image');
    
        $validate=$this->validate($request,[
            'title'=>['required','string','max:255'],
            'description'=>['required','string','max:255'],
        ]);
       if ($image){
                $path=$image->store('eventos');
                $filename = preg_replace('/^.+[\\\\\\/]/', '', $path);
                $new->image=$filename;
            }
            
        $new->title=$title;
        $new->description=$description;    
        $new->save();
        return view('penja')->with(['a'=>"Se ha publicado correctamente"]);
    }    
    else{
        return view('error');
    }



}


}
