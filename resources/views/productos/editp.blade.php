@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col text-center">
            <h1>Editar</h1>
        </div>
    </div>
    <div class="row justify-content-center">
         <div class="col-md-6" style="border-radius: 10px; overflow: hidden; background-color: #fff; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5); padding: 20px;">
            <x-form enctype="multipart/form-data" method="PUT">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text"
                        class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder=""
                        required value="{{$p->nombre}}">
                    <small id="helpId" class="form-text text-muted">Modifique el Nombre.</small>
                </div>
                <div class="mb-3">
                    <label for="img" class="form-label">Imagen Producto</label>
                    <img src="{{url($p->img)}}" alt="Imagen categoría" class="img-fluid mb-2">
                    <input type="file" class="form-control" name="img" id="img" placeholder="" aria-describedby="fileHelpId">
                    <div id="fileHelpId" class="form-text">Selecciona una nueva imagen representativa para el producto.</div>
                </div>
                <div class="mb-3">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="number"
                        class="form-control" name="precio" id="precio" aria-describedby="helpId" placeholder=""
                        required value="{{$p->precio}}" min="0">
                    <small id="helpId" class="form-text text-muted">Ingresa el precio a ser editado.</small>
                </div>
                <div class="mb-3">
                    <label for="precio" class="form-label">Stock</label>
                    <input type="number"
                        class="form-control" name="stock" id="stock" aria-describedby="helpId" placeholder=""
                        required value="{{$p->stock}}" min="0">
                    <small id="helpId" class="form-text text-muted">Ingresa el stock a ser editado.</small>
                </div>
                <div class="mb-3">
                    {{-- <label for="nombre" class="form-label">Tipo</label>
                    <input type="text"
                        class="form-select" name="tipo" id="tipo" aria-describedby="helpId" placeholder=""
                        required value="{{ $p->categoria->nombre }}">
                    <small id="helpId" class="form-text text-muted">Actualice al tipo que pertenece el producto</small> --}}
                    <label>Categoría</label>

                        <select name="catId" class="form-control">

                            @foreach ($categorias as $cat)
                                {{-- <option value="{{$cat->id}}" 
                                    {{ $categoria->id == $prod->categoria_id ? 'selected' : '' }}>
                                    {{$categoria->nombre}}
                                </option> --}}
                                <option value="{{$cat->id}}">{{$cat->nombre}}</option>
                            @endforeach
                        </select>
                </div>
                <div class="mb-3">
                    <label for="tipo" class="form-label">Tipo</label>
                    <input type="text"
                        class="form-control" name="tipo" id="tipo" aria-describedby="helpId" placeholder=""
                        required value="{{$p->tipo}}">
                    <small id="helpId" class="form-text text-muted">Ingrese el Tipo a ser editado.</small>
                </div>
                <div class="mb-3">
                    <label for="contenido" class="form-label">Contenido</label>
                    <input type="text"
                        class="form-control" name="contenido" id="contenido" aria-describedby="helpId" placeholder=""
                        required value="{{$p->contenido}}">
                    <small id="helpId" class="form-text text-muted">Ingrese el contenido a ser editado.</small>
                </div>
                <div class="mb-3">
                    <label for="detalles" class="form-label">Detalles</label>
                    <input type="text"
                        class="form-control" name="detalles" id="detalles" aria-describedby="helpId" placeholder=""
                        required value="{{$p->detalles}}">
                    <small id="helpId" class="form-text text-muted">Ingresa el detalle a ser editado.</small>
                </div>
                <button type="submit" class="btn btn-primary w-100">Modificar</button>
            </x-form>
        </div>
    </div>
</div>
@endsection
