<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Categoria;
class CategoriaController extends Controller
{
    function index()
    {
        $listaCat= Categoria::all();
        return view ("categorias.index", array('listaCat'=>$listaCat));   
    }
    function store(Request $r)
    {
      //dd($r->all());
      $this->validate($r, [
        'nombre'=>'required|unique:categorias',
        'img'=>'required',
      ]);
      $cat = new Categoria();
      $cat->nombre = $r->nombre;
      $cat->img = $r->img->store("images", "public");
      $cat->save();
      return redirect('/categorias');
    }
    function edit($id)
    {
      //dd($r->all());
      $cat = Categoria::find($id);
      return view('categorias.edit',array('cat'=>$cat));
    }
    function putEdit(Request $r,$id)
    {
      //dd($r->all());
      $cat = Categoria::find($id);
      $cat->nombre = $r->nombre;
      if($r->hasFile('img')){
        $cat->img = $r->img->store('images','public');
      }
      $cat->save();
      return redirect('/categorias');
    }
    // function delete($id){
    //   $cat = Categoria::find($id);
    //   $cat->delete();
    //   return redirect('/categorias');
    // }
    public function destroy($id)
    {
        $cat = Categoria::findOrFail($id);
        $cat->delete();
        return redirect('/categorias');
    }
}
