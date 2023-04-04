<div class="container">
    <h1>Editar Producto</h1>

    <form action="{{ route('productos.update', $producto->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{ old('nombre', $producto->nombre) }}" required>
            @error('nombre')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion" required>{{ old('descripcion', $producto->descripcion) }}</textarea>
            @error('descripcion')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="number" class="form-control @error('precio') is-invalid @enderror" id="precio" name="precio" value="{{ old('precio', $producto->precio) }}" required>
            @error('precio')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="number" class="form-control @error('stock') is-invalid @enderror" id="stock" name="stock" value="{{ old('stock', $producto->stock) }}" required>
            @error('stock')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="categoria">Categoría</label>
            <select class="form-control @error('categoria') is-invalid @enderror" id="categoria" name="categoria">
                <option value="">Seleccione una categoría</option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ $producto->category_id == $categoria->id ? 'selected' : '' }}>{{ $categoria->nombre }}</option>
                @endforeach

            </select>
            @error('categoria')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="imagen">Imagen</label>
            <input type="file" class="form-control-file @error('imagen') is-invalid @enderror" id="imagen" name="imagen">
            @error('imagen')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <img src="{{ asset('storage/' . $producto->imagen) }}" alt="Imagen del producto" class="img-fluid" style="max-height: 200px;">
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>