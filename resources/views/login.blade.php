<form method="POST" action="{{ route('login') }}">
    @csrf

    <div>
        <label for="email">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>

        @error('email')
            <span role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div>
        <label for="password">Contraseña</label>
        <input id="password" type="password" name="password" required>

        @error('password')
            <span role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div>
        <label for="remember">
            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            Recordar sesión
        </label>
    </div>

    <div>
        <button type="submit">Iniciar sesión</button>
    </div>
</form>