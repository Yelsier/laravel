<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categorias = Category::all();
        return view('categorias.index', compact('categorias'));
    }

    public function create()
    {
        return view('categorias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|unique:categories'
        ]);

        $categoria = Category::create($request->all());
        return redirect()->route('categorias.show', $categoria);
    }

    public function show(Category $categoria)
    {
        return view('categorias.show', compact('categoria'));
    }

    public function edit(Category $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }

    public function update(Request $request, Category $categoria)
    {
        $request->validate([
            'nombre' => 'required|unique:categories,nombre,' . $categoria->id
        ]);

        $categoria->update($request->all());
        return redirect()->route('categorias.show', $categoria);
    }

    public function destroy(Category $categoria)
    {
        $categoria->delete();
        return redirect()->route('categorias.index');
    }
}