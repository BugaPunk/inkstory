<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Producto;
class ProductoController extends Controller
{
    function index()
    {
        $listaCat = Categoria::all();
        $listaProd = Producto::all();
        return view('productos.index',array('listaCat'=>$listaCat,'listaProd'=>$listaProd)); 
    }
    public function store(Request $r){
        // dd($r->all());
        $validate = $r->validate([
            "nombre" => "required|unique:productos,nombre|max:50",
            "img" => "required|image|mimes:png,jpg,jpge|max:3000",
            "precio" => "required|numeric|min:0", // Asegura que el precio no sea negativo
            "stock" => "required|integer|min:0", // Asegura que el stock no sea negativo
            "catId" => "required|exists:categorias,id",
            "tipo" => "nullable|string", // Asegura que 'tipo' sea texto y puede ser nulo
            "contenido" => "required|string",
            "detalles" => "required|string",
            // "categoria_id" => "required|exists:categorias,id"
        ]);
        $prod = new Producto();
        $prod->nombre = $r->input("nombre");
        $prod->img = $r->img->store("images", "public");
        // $prod->img = $r->input('img')->store('images','pub');
        $prod->precio = $r->precio;
        $prod->stock = $r->stock;
        $prod->categoria_id = $r->catId;
        $prod->tipo = $r->tipo;
        $prod->contenido = $r->contenido;
        $prod->detalles = $r->detalles;
        $prod->save();
        return redirect('/productos');
    }
    public function edit($id){
        //dd($r->all());
      $prod = Producto::find($id);
      $categorias = Categoria::all();
      return view('productos.editp', array('p' => $prod, 'categorias' => $categorias));
      // return view('productos.editp',array('p'=>$prod,'categorias'));
    }
    function putEdit(Request $r,$id)
    {
      //dd($r->all());
      $prod = Producto::find($id);
      $prod->nombre = $r->nombre;
      if($r->hasFile('img')){
        $prod->img = $r->img->store('images','public');
      }
      $prod->precio = $r->precio;
      $prod->stock = $r->stock;
      $prod->categoria_id = $r->catId;
      $prod->tipo = $r->tipo;
      $prod->contenido = $r->contenido;
      $prod->detalles = $r->detalles;
      $prod->save();
      return redirect('/productos');
    }
    public function destroy($id)
    {
        $prod = Producto::findOrFail($id);
        $prod->delete();
        return redirect('/productos');
    }
}
