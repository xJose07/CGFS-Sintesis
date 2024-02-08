<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Entrante;
use App\Models\Postre;
use App\Models\Primerplato;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class MenuController extends Controller
{


    public function index()
    {
        $rol =\Auth::user()->role;
        
        if($rol == 'chef'){
            
            $datE = Entrante::all();
            $datPP = Primerplato::all();
            $datP = Postre::all();

            return view('crear_menu')->with('datE', $datE)->with('datPP', $datPP)->with('datP', $datP);    
        }
        
        else{
            return view('error');
        }
       
    }



    public function update(Request $request){

        $rol =\Auth::user()->role;
        
        if($rol == 'chef'){
            
            //$menu = Menu::first();
            $menu1 = DB::table('menus')->where('id', 1)->get('*')->first();
            $menu2 = DB::table('menus')->where('id', 2)->get('*')->first();
            $menu3 = DB::table('menus')->where('id', 3)->get('*')->first();


            $ent=$request->get('ent');
            $prim=$request->get('prim');
            $postre=$request->get('postre');

            $ent2=$request->get('ent2');
            $prim2=$request->get('prim2');
            $postre2=$request->get('postre2');

            $ent3=$request->get('ent3');
            $prim3=$request->get('prim3');
            $postre3=$request->get('postre3');

            if($menu1){
                $m=Menu::all();
                foreach ($m as $menu) {
                    if($menu->id==$menu1->id){
                        $menu->entrante=$ent;
                        $menu->primer=$prim;
                        $menu->postre=$postre;
                        $menu->update();     
                    }
                    if($menu->id==$menu2->id){
                        $menu->entrante=$ent2;
                        $menu->primer=$prim2;
                        $menu->postre=$postre2;
                        $menu->update();     
                    }
                    if($menu->id==$menu3->id){
                        $menu->entrante=$ent3;
                        $menu->primer=$prim3;
                        $menu->postre=$postre3;
                        $menu->update();     
                    }
                }
            }
            $data = Menu::all();

            return view('menu')->with('data', $data);;   
            
        }
        
        else{
            return view('error');
        }
           
    }

    public function show()
    {
        $data = Menu::all();

        return view('menu')->with('data', $data);
            
    }

}
