<div class="container">
    <h1>Detalle del Producto</h1>

    <div class="row">
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">{{ $producto->nombre }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Categoría: {{ $producto->category->nombre }}</h6>
                </div>
                <img src="{{ asset('storage/' . $producto->imagen) }}" alt="Imagen del producto" class="card-img-top">
            </div>
        </div>
        <div class="col-md-8">
            <table class="table">
                <tbody>
                    <tr>
                        <td><strong>Descripción:</strong></td>
                        <td>{{ $producto->descripcion }}</td>
                    </tr>
                    <tr>
                        <td><strong>Precio:</strong></td>
                        <td>{{ $producto->precio }}</td>
                    </tr>
                    <tr>
                        <td><strong>Stock:</strong></td>
                        <td>{{ $producto->stock }}</td>
                    </tr>
                </tbody>
            </table>

            <div>
                <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-warning">Editar</a>
                <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar este producto?')">Eliminar</button>
                </form>
            </div>
        </div>
    </div>

    <div>
        <a href="{{ route('productos.index') }}" class="btn btn-secondary">Volver al Listado</a>
    </div>
</div>