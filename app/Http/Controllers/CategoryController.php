<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Carbon;

use Intervention\Image\ImageManagerStatic as Image;

use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lists = Category::all();
        return view('layouts.dashboard.category.index', compact('lists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.dashboard.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'category_name'=>'required',
        // ]);

        // Category::insert([
        //     'category_name'=> $request->category_name,
        //     'category_slug'=> $request->category_slug,
        //     'category_description'=> $request->category_description,
        //     'category_image'=> $request->category_image,
        //     'created_at' => Carbon::now(),
        // ]);

        // return back()->with('category_add', 'Category Added Successfully');

        // return $request->file('category_image');
        // return $request->file('category_image')->getClientOriginalExtension();

        
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
