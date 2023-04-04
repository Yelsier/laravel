<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Categorías</div>
                <div class="card-body">
                    <a href="{{ route('categorias.create') }}" class="btn btn-primary mb-3">Crear categoría</a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categorias as $categoria)
                                <tr>
                                    <td>{{ $categoria->id }}</td>
                                    <td>{{ $categoria->nombre }}</td>
                                    <td>
                                        <a href="{{ route('categorias.show', $categoria) }}" class="btn btn-sm btn-info">Ver</a>
                                        <a href="{{ route('categorias.edit', $categoria) }}" class="btn btn-sm btn-warning">Editar</a>
                                        <form action="{{ route('categorias.destroy', $categoria) }}" method="POST" style="display: inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>