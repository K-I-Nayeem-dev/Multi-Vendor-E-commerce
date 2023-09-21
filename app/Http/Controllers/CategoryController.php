<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Carbon;

use Intervention\Image\ImageManagerStatic as Image;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Str;

use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('layouts.dashboard.category.index', [
            'category'=> Category::all(),
        ]);
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
        $request->validate([
            'category_name'=>'required',
        ]);


        $new_name = $request->category_name.time() . "." . $request->file('category_image')->getClientOriginalExtension();
        $img =Image::make($request->file('category_image'))->resize(300, 300);
        $img->save(base_path('public\uploads\category_photos/' . $new_name), 80);

        Category::insert([
            'category_name'=> $request->category_name,
            'category_slug'=> Str::slug($request->category_slug),
            'category_description'=> $request->category_description,
            'category_image'=> $new_name,
            'created_at' => Carbon::now(),
        ]);

        return redirect('category')->with('category_add', 'Category Added Successfully');

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
        Category::findOrFail($id)->delete();
        return back()->with('cate_deleted', "ID " . $id . " Category Deleted");
    }
}
