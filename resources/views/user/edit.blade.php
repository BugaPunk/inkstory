@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col text-center">
            <h1>Editar Usuarios</h1>
        </div>
    </div>
    <div class="row justify-content-center">
         <div class="col-md-6" style="border-radius: 10px; overflow: hidden; background-color: #fff; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5); padding: 20px;">
            <x-form enctype="multipart/form-data" method="POST ">
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre Usuario</label>
                    <input type="text"
                        class="form-control" name="name" id="name" aria-describedby="helpId" placeholder=""
                        required value="{{$u->name}}">
                    <small id="helpId" class="form-text text-muted">Modifique el Nombre de Usuario.</small>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email"
                        class="form-control" name="email" id="email" aria-describedby="helpId" placeholder=""
                        required value="{{$u->email}}" min="0">
                    <small id="helpId" class="form-text text-muted">Ingresa el email a ser editado.</small>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password"
                        class="form-control" name="password" id="password" aria-describedby="helpId" placeholder=""
                        >
                    <small id="helpId" class="form-text text-muted">Ingresa el password a ser editado.</small>
                </div>
                <div class="mb-3">
                    <label for="password" class="password">Password Confirm</label>
                    <input type="password"
                        class="form-control" name="password" id="password" aria-describedby="helpId" placeholder=""
                        >
                    <small id="helpId" class="form-text text-muted">Ingresa el password a ser editado.</small>
                </div>
                <div class="mb-3">
                    {{-- <label for="nombre" class="form-label">Tipo</label>
                    <input type="text"
                        class="form-select" name="tipo" id="tipo" aria-describedby="helpId" placeholder=""
                        required value="{{ $p->categoria->nombre }}">
                    <small id="helpId" class="form-text text-muted">Actualice al tipo que pertenece el producto</small> --}}
                    <label>Rol</label>

                        <select name="catId" class="form-control">

                            @foreach ($roles as $role)
                                {{-- <option value="{{$cat->id}}" 
                                    {{ $categoria->id == $prod->categoria_id ? 'selected' : '' }}>
                                    {{$categoria->nombre}}
                                </option> --}}
                                <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                        </select>
                </div>
                <button type="submit" class="btn btn-primary w-100">Modificar</button>
            </x-form>
        </div>
    </div>
</div>
@endsection
