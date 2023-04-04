<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if (auth()->check())
        <a href="/logout">Log out</a>
    @else
        <a href="/login">Log in</a>
    @endif

    <a href="/productos">Productos</a>
    <a href="/categorias">Categorias</a>

    

@if (session('cart'))
<h2>Cart</h2>
    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @php
                $total = 0;
            @endphp
            @foreach (session('cart') as $productId => $product)
                <tr>
                    <td>{{ $product['name'] }}</td>
                    <td>{{ $product['price'] }}</td>
                    <td>{{ $product['quantity'] }}</td>
                    <td>{{ $product['price'] * $product['quantity'] }}</td>
                    <td>
                        <form method="POST" action="{{ route('productos.removeProduct', $productId) }}">
                            @csrf
                            <button type="submit">Remove</button>
                        </form>
                    </td>
                </tr>
                @php
                    $total += $product['price'] * $product['quantity'];
                @endphp
            @endforeach
            <tr>
                <td colspan="3">Total</td>
                <td>{{ $total }}</td>
                <td></td>
            </tr>
        </tbody>
    </table>
@endif
</body>
</html>