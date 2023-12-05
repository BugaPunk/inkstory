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
                        required value="{{$cat->nombre}}">
                    <small id="helpId" class="form-text text-muted">Ingresa el nombre de la categoría.</small>
                </div>
                <div class="mb-3">
                    <label for="img" class="form-label">Imagen categoría</label>
                    <img src="{{url($cat->img)}}" alt="Imagen categoría" class="img-fluid mb-2">
                    <input type="file" class="form-control" name="img" id="img" placeholder="" aria-describedby="fileHelpId">
                    <div id="fileHelpId" class="form-text">Selecciona una nueva imagen representativa para la categoría.</div>
                </div>
                <button type="submit" class="btn btn-primary w-100">Modificar</button>
            </x-form>
        </div>
    </div>
</div>
@endsection
