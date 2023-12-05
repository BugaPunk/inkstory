@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col text-center">
            <h1>Editar Permiso</h1>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6" style="border-radius: 10px; overflow: hidden; background-color: #fff; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5); padding: 20px;">
            <x-form enctype="multipart/form-data" action="{{ route('permission.update', $permission->id) }}" method="POST">
                @method('PUT')
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre del Permiso</label>
                    <input type="text"
                        class="form-control" name="name" id="name" aria-describedby="helpId" placeholder=""
                        required value="{{ $permiso->name }}">
                    <small id="helpId" class="form-text text-muted">Ingresa el nombre del Permiso.</small>
                </div>
                <button type="submit" class="btn btn-primary w-100">Modificar</button>
            </x-form>
        </div>
    </div>
</div>
@endsection
