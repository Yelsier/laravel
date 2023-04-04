<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{

    public function index()
    {
        $productos = Producto::all();
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        $categorias = Category::all();
        return view('productos.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $producto = new Producto();
        $producto->imagen = $request->file('imagen')->store('', 'public');
        $producto->nombre = $request->input('nombre');
        $producto->descripcion = $request->input('descripcion');
        $producto->precio = $request->input('precio');
        $producto->stock = $request->input('stock');
        $producto->category_id = $request->categoria;
        $producto->save();

        return redirect()->route('productos.index');
    }

    public function show(Producto $producto)
    {
        return view('productos.show', compact('producto'));
    }

    public function edit(Producto $producto)
    {
        $categorias = Category::all();
        return view('productos.edit', compact('producto', 'categorias'));
    }

    public function update(Request $request, Producto $producto)
    {
        if ($request->file('imagen')) {
            if (Storage::exists("/public//" . $producto->imagen)) {
                Storage::delete("/public//" . $producto->imagen);
            }
            $producto->imagen = $request->file('imagen')->store('', 'public');
        }
        $producto->nombre = $request->input('nombre');
        $producto->precio = $request->input('precio');
        $producto->stock = $request->input('stock');
        $producto->descripcion = $request->input('descripcion');
        $producto->category_id = $request->input('categoria');
        $producto->save();

        return redirect()->route('productos.index');
    }

    public function destroy(Producto $producto)
    {
        if (Storage::exists("/public//" . $producto->imagen)) {
            Storage::delete("/public//" . $producto->imagen);
        }

        $producto->delete();

        return redirect()->route('productos.index');
    }

    public function addProduct(Request $request, $productId)
    {
        $product = Producto::find($productId);
        if (!$product) {
            return redirect()->back()->withErrors(['Product not found']);
        }

        $cart = session()->get('cart', []);
        if (!$cart) {
            $cart = [
                $product->id => [
                    'name' => $product->nombre,
                    'quantity' => 1,
                    'price' => $product->precio,
                ]
            ];
            session()->put('cart', $cart);
        } else {
            if (isset($cart[$product->id])) {
                $cart[$product->id]['quantity']++;
                session()->put('cart', $cart);
            } else {
                $cart[$product->id] = ['name' => $product->name, 'quantity' => 1, 'price' => $product->price,];
                session()->put('cart', $cart);
            }
        }

        return redirect()->back()->with('success', 'Product added to cart');
    }

    public function removeProduct(Request $request, $productId)
    {
        $cart = session()->get('cart');
        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product removed from cart');
        }

        return redirect()->back()->withErrors(['Product not found']);
    }
}