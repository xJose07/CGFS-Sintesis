<?php


namespace App\Http\Controllers;
//namespace App\Http\Requests;
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

class UserController extends Controller
{
    public function index(Request $request)
{
    return view('edita')->with(['a'=>""]);
}
    
    public function update(Request $request)
{
    $user=\Auth::user();
    $id =\Auth::user()->id;
    
    
    
    $name=$request->input('name');
    $surname=$request->input('surname');
    $email=$request->input('email');
    $image_path = $request->file('image');

    $validate=$this->validate($request,[
        'name'=>['required','string','max:255'],
        'surname'=>['required','string','max:255'],
        'email'=>'required|string|max:255|unique:users,email,'.$id,
    ]);


    $user->name=$name;
    $user->surname=$surname;
    $user->email=$email;

    if ($image_path){
            $path=$image_path->store('users');
            $filename = preg_replace('/^.+[\\\\\\/]/', '', $path);
            $user->image=$filename;
        }

    $user->update();
    return view('edita')->with(['a'=>"Se ha editado correctamente"]);

}

//eliminar user actual

public function deleteuser(Request $request)
{
    $user=\Auth::user();
    $id =\Auth::user()->id;
    
    $user->delete();
    $eventos = Evento::orderBy('created_at', 'desc')->paginate(2);
    $users = User::all();
        
    return view('/home',compact('eventos'))->with('eventos', $eventos)->with('users', $users);

}
public function deleteusersegur(Request $request)
{    
    return view('segur');
}
    public function updatepass(Request $request)
    {   
        $user=\Auth::user();
        $id =\Auth::user()->id;
        
        $password=$request->input('password');
    if ($password){ 

        $validate=$this->validate($request,[
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    
    
        $user->password=Hash::make($password);

    
        $user->update();
        return view('editpass')->with(['a'=>"Se ha editado correctamente"]);}
        else{
            return view('editpass')->with(['a'=>""]);
        };
    
        
        
        
        //return view('editpass')->with(['a'=>""]);
    }
    public function getimage($filename)
    {
        $file=Storage::disk('users')->get($filename);
        return new Response($file,200);
    }


    //reserves actives
    public function verreserva()
    {
        $user=\Auth::user();
        $email =\Auth::user()->email;
        $taules = Reserva::all();
        return view('ver-reserva')->with('taules', $taules)->with(['a'=>""]);

    }


    public function updateverreserva($id)
        {
            $user=\Auth::user();
            $email =\Auth::user()->email;
            $taules = Reserva::all();

            foreach($taules as $taula){
                if($id==$taula->id){
                    $taula->usuario=NULL;
                    $taula->reservat="FALSE";
    
                    $taula->update();
                }
            };
        
            return view('ver-reserva')->with('taules', $taules)->with(['a'=>"Se ha eliminado correctamente"]);

        }


}
