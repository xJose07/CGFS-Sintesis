<?php

namespace App\Http\Controllers;

use App\Models\Entrante;
use App\Models\Postre;
use App\Models\Primerplato;
use App\Models\Vino;
use Illuminate\Http\Response;


use Illuminate\Http\Request;
use App\Http\Controllers\Auth;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class CartaController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $rol =\Auth::user()->role;
        
        if($rol == 'chef'){
            return view('plat');
        }
        else{
            return view('error');
        }  
    }

    public function index2()
    {
        $rol =\Auth::user()->role;
        
        if($rol == 'chef'){
            return view('vi');
        }
        else{
            return view('error');
        }  
    }

    public function update(Request $request){
        
        $rol =\Auth::user()->role;
        
        if($rol == 'chef'){
            $name=$request->input('name');
            $desc=$request->input('description');
            $tipus=$request->get('plat');
            $image_path = $request->file('image');
            $preu = $request->input('preu');
        
            $validate=$this->validate($request,[
                'name'=>['required','string','max:255'],
                'description'=>['required','string','max:255'],
            ]);
    
    
            if($tipus == 'entrant'){
                $entrant = New Entrante();
    
                $entrant->name=$name;
                $entrant->description=$desc;
                $entrant->precio=$preu;
    
                if ($image_path){
                    $path=$image_path->store('entrantes');
                    $filename = preg_replace('/^.+[\\\\\\/]/', '', $path);
                    $entrant->image=$filename;
                }
        
                $entrant->save();
    
                return view('plat');
    
            }
            elseif($tipus == 'primer plat'){
                $primer = new Primerplato();
    
                $primer->name=$name;
                $primer->description=$desc;
                $primer->precio=$preu;
    
                if ($image_path){
                    $path=$image_path->store('primer');
                    $filename = preg_replace('/^.+[\\\\\\/]/', '', $path);
                    $primer->image=$filename;
                }
        
                $primer->save();
    
                return view('plat');
    
            }
            elseif($tipus == 'postre'){
                $postre = new Postre();
    
                $postre->name=$name;
                $postre->description=$desc;
                $postre->precio=$preu;
    
                if ($image_path){
                    $path=$image_path->store('postre');
                    $filename = preg_replace('/^.+[\\\\\\/]/', '', $path);
                    $postre->image=$filename;
                }
        
                $postre->save();
    
                return view('plat');
    
            }
        }
        else{
            return view('error');
        }    
    }

    public function show()
    {
        $datE = Entrante::all();
        $datPP = Primerplato::all();
        $datP = Postre::all();
        return view('carta')->with('datE', $datE)->with('datPP', $datPP)->with('datP', $datP);
            
    }

    // añadir vino a la carta
    public function update2(Request $request){
        
        $rol =\Auth::user()->role;
        
        if($rol == 'chef'){
            $name=$request->input('name');
            $desc=$request->input('description');
            $image_path = $request->file('image');
            $preu = $request->input('preu');
        
            $validate=$this->validate($request,[
                'name'=>['required','string','max:255'],
                'description'=>['required','string','max:255'],
            ]);
    
            $vino = New Vino();

            $vino->name=$name;
            $vino->description=$desc;
            $vino->precio=$preu;

            if ($image_path){
                $path=$image_path->store('vino');
                $filename = preg_replace('/^.+[\\\\\\/]/', '', $path);
                $vino->image=$filename;
            }
    
            $vino->save();

            return view('plat');
        
        }
        else{
            return view('error');
        }
        
    }
    //enseñar carta vino
    public function show2()
    {
        $datV = Vino::all();
        return view('carta_vino')->with('data', $datV);
            
    }


    public function getimageE($filename)
    {
        $file=Storage::disk('entrantes')->get($filename);
        return new Response($file,200);
    }

    public function getimagePP($filename)
    {
        $file=Storage::disk('primer')->get($filename);
        return new Response($file,200);
    }

    public function getimageP($filename)
    {
        $file=Storage::disk('postre')->get($filename);
        return new Response($file,200);
    }

    
    public function getimageV($filename)
    {
        $file=Storage::disk('vino')->get($filename);
        return new Response($file,200);
    }

    public function detailE($id){
        $datE = Entrante::all();
        foreach($datE as $el){
            if($el->id == $id){
                return view('detailE')->with('element', $el);
            }
        }

    }

    public function detailPP($id){
        $datPP = Primerplato::all();
        foreach($datPP as $el){
            if($el->id == $id){
                return view('detailPP')->with('element', $el);
            }
        }

    }

    public function detailP($id){
        $datP = Postre::all();
        foreach($datP as $el){
            if($el->id == $id){
                return view('detailP')->with('element', $el);
            }
        }

    }

    //eliminar vi
    public function eliminarvino(Request $request,$id){
        
        $rol =\Auth::user()->role;
        
        if($rol == 'chef'){
    
            $vinos =Vino::all();
            
            foreach($vinos as $vino){
                if($id==$vino->id){
                    $vino->delete();
                }
            };
            
            return view('carta_vino')->with('data', $vinos);
        
        }
        else{
            return view('error');
        }
        
    }

    //eliminar plat

    public function eliminar(Request $request,$id,$tipus){
        
        $rol =\Auth::user()->role;
        $datE = Entrante::all();
        $datPP = Primerplato::all();
        $datP = Postre::all();
        
        if($rol == 'chef'){
    
    
            if($tipus == 'entrant'){
                $plats= Entrante::all();

                foreach($plats as $plat){
                    if($id==$plat->id){
                        $plat->delete();
                    }
                };
    
    
            }
            elseif($tipus == 'primer plat'){
                $plats= Primerplato::all();

                foreach($plats as $plat){
                    if($id==$plat->id){
                        $plat->delete();
                    }
                };
    
    
            }
            elseif($tipus == 'postre'){
                $plats= Postre::all();

                foreach($plats as $plat){
                    if($id==$plat->id){
                        $plat->delete();
                    }
                };
    
    
            }
            return view('carta')->with('datE', $datE)->with('datPP', $datPP)->with('datP', $datP);

        }
        else{
            return view('error');
        }    
    }
}
