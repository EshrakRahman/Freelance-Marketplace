<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $services = Service::with('category')->latest()->simplePaginate(10);

        return view('service.index', ['services' => $services]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categories = Category::orderBy('name');

        return view('service.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'string'],
            'price' => ['required', 'numeric'],
            'category_id' => ['required', 'exists:categories,id'],
        ]);

        // dd($attributes);

        Service::create($attributes);

        return redirect()->route('services.index')->with('success', 'Service successfully added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service): View
    {
        $categories = Category::orderBy('name')->get();


        return view('service.edit', compact('service', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $attributes = $request->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'string'],
            'price' => ['required', 'numeric'],
            'category_id' => ['required', 'exists:categories,id'],
        ]);

        // dd($attributes);

        $service->update($attributes);

        return redirect()->route(route: 'services.index')->with('success', 'Service successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route(route: 'services.index')->with('success', 'Service successfully deleted!');
    }
}
