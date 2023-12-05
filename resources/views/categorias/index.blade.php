@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row mb-4">
        <div class="col-md-6"><h2 class="btn-lg">Admin Categorias</h2></div>
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
                        {{-- <form action="{{ url('/categorias') }}" method="post" > --}}
                        <x-form enctype="multipart/form-data">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTitleId">Categorias</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                @csrf
                                <div class="mb-3">
                                  <label for="" class="form-label">Nombre</label>
                                  <input type="text"
                                    class="form-control" name="nombre" id="" aria-describedby="helpId" placeholder="">
                                  <small id="helpId" class="form-text text-muted">Ingresa el nombre de la categoría.</small>
                                </div>
                                <div class="mb-3">
                                  <label for="" class="form-label">Choose file</label>
                                  <input type="file" class="form-control" name="img" id="" placeholder="" aria-describedby="fileHelpId">
                                  <div id="fileHelpId" class="form-text">Selecciona una imagen representativa para la categoría.</div>
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
                        <th scope="col" >ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Img</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($listaCat as $c)
                    <tr class="table-info">
                        <td scope="row">{{ $c->id }}</td>
                        <td>{{ $c->nombre }}</td>
                        <td><img src="{{ $c->img }}" alt="" width="64"></td>
                        <td>
                            <a class="btn btn-warning" href="{{ url("categorias/edit/".$c->id) }}" role="button">Editar</a>
                            <form action="{{ route('categorias.destroy', $c->id) }}" method="post" style="display:inline;">
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
