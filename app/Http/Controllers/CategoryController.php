<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Livewire\WithPagination;

class CategoryController extends Controller
{
    use WithPagination;
    protected $paginationTheme = 'tailwind';

    public function index()
    {
        $categories = Category::paginate(6);
        return view('categories.index', compact('categories'));
    }
    public function create()
    {
        // return view('categories.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
        ]);

        Category::create(['name' => $request->input('name')]);

        return redirect()->route('category.index')->with('success', 'Categoria creata con successo.');
    }
    public function edit($id)
    {
        $category = Category::find($id);
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'newName' => 'required|string|max:255',
        ]);

        if($category->name === $request->input('newName')) {
            return redirect()->back()->with('error', 'Modifica non andata a buonfine. Il nome attuale è uguale al nuovo.');
        }
        $category->name = $request->input('newName');
        $category->save();
        
        return redirect()->route('category.index')->with('success', 'Categoria aggiornata con successo.');
    }

    public function destroy($id)
    {
        Category::destroy($id);
        return redirect()->route('category.index')->with('success', 'Categoria eliminata con successo.');
    }
}
