<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ $categoria->nombre }}</div>
                <div class="card-body">
                    <p>ID: {{ $categoria->id }}</p>
                    <p>Nombre: {{ $categoria->nombre }}</p>
                    <a href="{{ route('categorias.edit', $categoria) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('categorias.destroy', $categoria) }}" method="POST" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>