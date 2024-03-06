<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('layouts.dashboard.category.index', [
            'category' => Category::where('user_id', auth()->id())
                ->get(),
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
            'category_name' => 'required',
            'category_image' => 'required',
        ]);

        $new_name = $request->category_name.time().'.'.$request->file('category_image')->getClientOriginalExtension();
        $img = Image::make($request->file('category_image'))->resize(300, 300);
        $img->save(base_path('public\uploads\category_photos/'.$new_name), 80);

        Category::insert([
            'category_name' => $request->category_name,
            'category_slug' => Str::slug($request->category_slug),
            'category_description' => $request->category_description,
            'category_image' => $new_name,
            'user_id' => auth()->id(),
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
        $user = Category::find($id);

        return view('layouts.dashboard.category.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = Category::find($id);

        return view('layouts.dashboard.category.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'category_name' => 'required',
        ]);

        if ($request->hasFile('category_image')) {

            unlink(base_path('public/uploads/category_photos/'.Category::find($id)->Category_Image));

            $new_name = $request->category_name.time().'.'.$request->file('category_image')->getClientOriginalExtension();
            $img = Image::make($request->file('category_image'))->resize(300, 300);
            $img->save(base_path('public\uploads\category_photos/'.$new_name), 80);

            Category::find($id)->update([
                'category_name' => $request->category_name,
                'category_slug' => Str::slug($request->category_slug),
                'category_description' => $request->category_description,
                'category_image' => $new_name,
                'updated_at' => Carbon::now(),
            ]);

        } else {

            Category::find($id)->update([
                'category_name' => $request->category_name,
                'category_slug' => Str::slug($request->category_slug),
                'category_description' => $request->category_description,
                'updated_at' => Carbon::now(),
            ]);

        }

        return redirect('category')->with('category_update', 'ID '.$id.' Category Update Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::findOrFail($id)->delete();

        return back()->with('cate_deleted', 'ID '.$id.' Category Deleted');
    }

    // Category Trash Route index
    public function category_trash()
    {
        return view('layouts.dashboard.trash.category_trash_index', [
            'category' => Category::onlyTrashed()->get(),
            'delete' => Category::onlyTrashed()->pluck('deleted_at'),
        ]);
    }

    // Category Trash Route show
    public function category_trash_details(string $id)
    {
        $user = Category::withTrashed()->find($id);

        return view('layouts.dashboard.trash.category_trash_show', compact('user'));
    }

    // Category Trash Route restore
    public function category_trash_restore(string $id)
    {
        Category::withTrashed()->find($id)->restore();
        Category::withTrashed()->find($id)->update([
            'deleted_at' => null,
        ]);

        return redirect('trash/category');
    }

    // Category Trash Route Permanent Delete
    public function category_trash_delete(string $id)
    {
        Category::withTrashed()->find($id)->forceDelete();

        return redirect('category');

    }

    // Category Trash Route Empty Trash
    public function empty_category_trash()
    {
        Category::onlyTrashed()->forceDelete();

        return redirect('category');
    }

    // Category Trash Route Empty Trash
    public function restore_category_trash()
    {
        Category::onlyTrashed()->restore();

        return redirect('category');
    }

    // Category Trash Route Empty Trash
    public function restore_category_pulck()
    {
        $user = Category::withTrashed()->pluck('deleted_at');

        return $user;
    }
}
