<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Crear un nuevo producto</div>

                <div class="panel-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ route('productos.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                            <label for="nombre" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" required autofocus>

                                @if ($errors->has('nombre'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }}">
                            <label for="descripcion" class="col-md-4 control-label">Descripción</label>

                            <div class="col-md-6">
                                <textarea id="descripcion" class="form-control" name="descripcion" required>{{ old('descripcion') }}</textarea>

                                @if ($errors->has('descripcion'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('descripcion') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('precio') ? ' has-error' : '' }}">
                            <label for="precio" class="col-md-4 control-label">Precio</label>

                            <div class="col-md-6">
                                <input id="precio" type="number" class="form-control" name="precio" value="{{ old('precio') }}" required step="0.01">

                                @if ($errors->has('precio'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('precio') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('stock') ? ' has-error' : '' }}">
                            <label for="stock" class="col-md-4 control-label">Stock</label>

                            <div class="col-md-6">
                                <input id="stock" type="number" class="form-control" name="stock" value="{{ old('stock') }}" required>

                                @if ($errors->has('stock'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('stock') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('categoria') ? ' has-error' : '' }}">
                            <label for="categoria" class="col-md-4 control-label">Categoría</label>

                            <div class="col-md-6">
                                <select id="categoria" name="categoria" class="form-control" required>
                                    <option value="">-- Seleccione una categoría --</option>
                                    @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->id }}" {{ old('categoria') == $categoria->id ? 'selected' : '' }}>{{ $categoria->nombre }}</option>
                                    @endforeach
                                </select>@if ($errors->has('categoria'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('categoria') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="imagen">Imagen</label>
                            <input type="file" class="form-control-file @error('imagen') is-invalid @enderror" id="imagen" name="imagen">
                            @error('imagen')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Crear producto
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>