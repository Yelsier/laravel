<div class="container">
    <h1>Productos</h1>

    <div class="d-flex justify-content-between mb-3">
        <div>
            <a href="{{ route('productos.create') }}" class="btn btn-primary">Crear Producto</a>
        </div>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Categoría</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($productos as $producto)
                <tr>
                    <td>{{ $producto->id }}</td>
                    <td><img src="{{ asset('storage/' . $producto->imagen) }}" alt="Imagen del producto" class="img-fluid" style="max-height: 200px;"></td>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->descripcion }}</td>
                    <td>{{ $producto->precio }}</td>
                    <td>{{ $producto->stock }}</td>
                    <td>{{ $producto->category->nombre }}</td>
                    <td>
                        <form method="POST" action="{{ route('productos.addProduct', $producto->id) }}">
                            @csrf
                            <button type="submit">Añadir</button>
                        </form> 
                        <a href="{{ route('productos.show', $producto->id) }}" class="btn btn-primary">Ver</a>
                        <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar este producto?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">No se encontraron productos.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>