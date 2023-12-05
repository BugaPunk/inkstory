<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class VentaController extends Controller
{
    function index(){
        $prods = Producto::all();
        return view('salidas.salidas', array('prods' => $prods));
    }
    // public function store(Request $r){
    //     DB::transaction(function () use($r){
    //         $v = new Venta();
    //         $v->fecha = Carbon::now();
    //         $v->save();
    //         $vecId = $r->id;
    //         $vecCants = $r->cantidad;
    //         $vecPrecios = $r->precio;
    //         for($i=0; $i < count($vecId); $i++){
    //             $p = Producto::find($vecId[$i]);
    //             $p->stock-=$vecCants[$i];
    //             $p->save();
    //             $v->productos()->attach($vecId[$i],['cantidad'=>$vecCants[$i], 'precios'=>$vecPrecios[$i]]);
    //         }
    //     });
        
    // }
    public function store(Request $r){
    DB::transaction(function () use ($r) {
        $v = new Venta();
        $v->fecha = Carbon::now();
        $v->save();

        // Verificar si las variables no son null y son arrays antes de utilizar count()
        $vecId = $r->id ?? [];
        $vecCants = $r->cantidad ?? [];
        $vecPrecios = $r->precio ?? [];

        // Verificar si las variables son arrays antes de utilizar count()
        if (is_array($vecId) && is_array($vecCants) && is_array($vecPrecios)) {
            for ($i = 0; $i < count($vecId); $i++) {
                $p = Producto::find($vecId[$i]);
                if ($p) {
                    $p->stock -= $vecCants[$i];
                    $p->save();
                    $v->productos()->attach($vecId[$i], ['cantidad' => $vecCants[$i], 'precio' => $vecPrecios[$i]]);
                }
            }
        } else {
           
        }
    });
}
}
