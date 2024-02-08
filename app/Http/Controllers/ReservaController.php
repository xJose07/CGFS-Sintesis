<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Entrante;
use App\Models\Postre;
use App\Models\Primerplato;
use App\Models\Reserva;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class ReservaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('reserva')->with(['a'=>""]);
    }

    public function reserva(Request $request){

            $tur=$request->get('turno');
            $per=$request->get('personas');
            $user=\Auth::user();

            if ($tur == 'Comida'){
                
                if ($per <=2){
                    //echo" 2 personas!";
                    
                    $table = DB::table('reserva_mesa')->where('turno', 'Comida')->where('reservat', 'FALSE')->where('tipo_mesa', 2)->get('*')->first();

                    //var_dump($table);
                    //die();
                    if($table){
                        $q=Reserva::all();
                        foreach ($q as $taula) {
                            if($taula->id==$table->id){
                                $taula->usuario=$user->email;
                                $taula->reservat='TRUE';
                                $taula->update();
                            }
                        }
                    
                    }
                    else{
                        return view('reserva',['site'=>'error'])->with(['a'=>"En este turno no hay mesas disponibles para la cantidad de personas seleccionada"]);                
                    }


                }
                elseif($per >2 && $per <=4 ){
                    //echo" 4 personas!";
                    $table = DB::table('reserva_mesa')->where('turno', 'Comida')->where('reservat', 'FALSE')->where('tipo_mesa', 4)->get('*')->first();

                    if($table){
                        $q=Reserva::all();
                        foreach ($q as $taula) {
                            if($taula->id==$table->id){
                                $taula->usuario=$user->email;
                                $taula->reservat='TRUE';
                                $taula->update();
                            }
                        }
                    
                    }
                    else{
                        return view('reserva',['site'=>'error'])->with(['a'=>"En este turno no hay mesas disponibles para la cantidad de personas seleccionada"]);                
                    }
                }
                elseif($per >4 && $per <=8){
                    //echo" 8 personas!";
                    $table = DB::table('reserva_mesa')->where('turno', 'Comida')->where('reservat', 'FALSE')->where('tipo_mesa', 8)->get('*')->first();

                    if($table){
                        $q=Reserva::all();
                        foreach ($q as $taula) {
                            if($taula->id==$table->id){
                                $taula->usuario=$user->email;
                                $taula->reservat='TRUE';
                                $taula->update();
                            }
                        }
                    
                    }
                    else{
                        return view('reserva',['site'=>'error'])->with(['a'=>"En este turno no hay mesas disponibles para la cantidad de personas seleccionada"]);                
                    }

                }

            }

            elseif($tur == 'Cena'){
                //echo" 2 personas!";
                    
                $table = DB::table('reserva_mesa')->where('turno', 'Cena')->where('reservat', 'FALSE')->where('tipo_mesa', 2)->get('*')->first();

                if($table){
                    $q=Reserva::all();
                    foreach ($q as $taula) {
                        if($taula->id==$table->id){
                            $taula->usuario=$user->email;
                            $taula->reservat='TRUE';
                            $taula->update();
                        }
                    }
                
                }
                else{
                    return view('reserva',['site'=>'error'])->with(['a'=>"En este turno no hay mesas disponibles para la cantidad de personas seleccionada"]);                
                }

            }
            elseif($per >2 && $per <=4 ){
                //echo" 4 personas!";
                $table = DB::table('reserva_mesa')->where('turno', 'Cena')->where('reservat', 'FALSE')->where('tipo_mesa', 4)->get('*')->first();

                if($table){
                    $q=Reserva::all();
                    foreach ($q as $taula) {
                        if($taula->id==$table->id){
                            $taula->usuario=$user->email;
                            $taula->reservat='TRUE';
                            $taula->update();
                        }
                    }
                
                }
                else{
                    return view('reserva',['site'=>'error'])->with(['a'=>"En este turno no hay mesas disponibles para la cantidad de personas seleccionada"]);                
                }
            }
            elseif($per >4 && $per <=8){
                //echo" 8 personas!";
                $table = DB::table('reserva_mesa')->where('turno', 'Cena')->where('reservat', 'FALSE')->where('tipo_mesa', 8)->get('*')->first();

                if($table){
                    $q=Reserva::all();
                    foreach ($q as $taula) {
                        if($taula->id==$table->id){
                            $taula->usuario=$user->email;
                            $taula->reservat='TRUE';
                            $taula->update();
                        }
                    }
                
                }
                else{
                    return view('reserva',['site'=>'error'])->with(['a'=>"En este turno no hay mesas disponibles para la cantidad de personas seleccionada"]);                
                }

            }
                return redirect('/emailres');
               //  
            }
            
            
           
    }


