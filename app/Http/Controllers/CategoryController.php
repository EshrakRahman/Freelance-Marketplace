<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;

class CategoryController extends Controller
{
    public function index(): View
    {
        $categories = Category::all();
        return view('category.index', ['categories' => $categories]);
    }

    public function create(): View
    {
        return view(view: 'category.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $attributes = $request->validate([
            'name' => ['required', 'min:1', 'max:255']
        ]);

        Category::create($attributes);

        return redirect('/categories');
    }

    public function show(Category $category): View
    {

        return view('category.show', ['category' => $category]);
    }

    public function edit(Category $category): View
    {
        return view('category.edit', compact('category'));
    }

    public function update(Request $request, Category $category): RedirectResponse
    {
        $attributes = $request->validate([
            'name' => ['required', 'min:1', 'max:255'],
        ]);

        $category->update($attributes);

        return redirect('/categories');
    }

    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();

        return redirect('/categories');
    }
}
