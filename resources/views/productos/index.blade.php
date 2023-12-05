@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row mb-4" >
        <div class="col-md-6"><h2 class="btn-lg">Insercion de Productos</h2></div>
        <div class="col-md-6 text-end">
            <!-- Modal trigger button -->
            <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#modalId">
              Añadir
            </button>
            
            <!-- Modal Body -->
            <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
            <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                    <div class="modal-content">
                        @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                                <ul>
                                    @foreach ($errors->all() as $error )
                                        <li>{{$errors}}</li>
                                    @endforeach
                                </ul>
                            </div>
                            
                        @endif
                        {{-- <form action="{{ url('/categorias') }}" method="post" > --}}
                        <x-form enctype="multipart/form-data" style="overflow:scroll; height:400px;" id="productoForm">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTitleId">Productos</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                @csrf
                                <div class="mb-3">
                                  <label for="" class="form-label">Nombre</label>
                                  <input type="text"
                                    class="form-control" name="nombre" id="" aria-describedby="helpId" placeholder="" value="{{old('nombre')}}">
                                  <small id="helpId" class="form-text text-muted">Ingresa el nombre del producto</small>
                                </div>
                                <div class="mb-3">
                                  <label for="" class="form-label">Elegir Archivo</label>
                                  <input type="file" class="form-control" name="img" id="" placeholder="" aria-describedby="fileHelpId">
                                  <div id="fileHelpId" class="form-text">Selecciona una imagen representativa para la categoría.</div>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Precio</label>
                                    <input type="number" class="form-control" name="precio" id="" placeholder="" aria-describedby="HelpId" min="0">
                                    <div id="HelpId" class="form-text text-muted">Añade el precio</div>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Stock</label>
                                    <input type="number" class="form-control" name="stock" id="" placeholder="" aria-describedby="HelpId" min="0">
                                    <div id="HelpId" class="form-text text-muted">Añade la cantidad de Existencias</div>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Categoria</label>
                                    <select name="catId">
                                        @foreach ( $listaCat as $c)
                                            <option value="{{$c->id}}">{{$c->nombre}}</option>
                                        @endforeach
                                    </select>
                                    <small id="helpId" class="form-text text-muted">Elige la categoria a la que pertenecera</small>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Tipo</label>
                                    <input type="text" class="form-control" name="tipo" id="" placeholder="" aria-describedby="HelpId">
                                    <div id="HelpId" class="form-text text-muted">Añade el tipo</div>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Contenido</label>
                                    <input type="text" class="form-control" name="contenido" id="" placeholder="" aria-describedby="HelpId">
                                    <div id="HelpId" class="form-text text-muted">Añade el precio</div>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Detalles</label>
                                    <input type="text" class="form-control" name="detalles" id="" placeholder="" aria-describedby="HelpId">
                                    <div id="HelpId" class="form-text text-muted">Añade el precio</div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </x-form>
                    </div>
                </div>
            </div>
            
            <!-- Optional: Place to the bottom of scripts -->
            <script>
                const myModal = new bootstrap.Modal(document.getElementById('modalId'), options)
            </script>
        </div>
    </div>
    <div class="row">
        <div class="table-responsive">
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Img</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Contenido</th>
                        <th scope="col">Detalles</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($listaProd as $prod)
                    <tr class="table-light">
                        <td scope="row">{{ $prod->id }}</td>
                        <td>{{ $prod->nombre }}</td>
                        <td><img src="{{ $prod->img }}" alt="" width="64"></td>
                        <td>{{ $prod->precio }}</td>
                        <td>{{ $prod->stock }}</td>
                        <td>{{ $prod->categoria->nombre }}</td>
                        <td>{{ $prod->tipo }}</td>
                        <td>{{ $prod->contenido }}</td>
                        <td>{{ $prod->detalles }}</td>
                        <td>
                            <a class="btn btn-warning" href="{{ url("productos/editp/".$prod->id) }}" role="button">Editar</a>
                            <form action="{{ route('productos.destroy', $prod->id) }}" method="post" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" role="button">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4">No hay datos</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
