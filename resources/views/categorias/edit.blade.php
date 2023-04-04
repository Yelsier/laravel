<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Editar categoría</div>
                <div class="card-body">
                    <form action="{{ route('categorias.update', $categoria) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre', $categoria->nombre) }}" required>
                            @error('nombre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>