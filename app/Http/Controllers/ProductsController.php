<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Color;
use App\Models\Products;
use App\Models\Variation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use ourcodeworld\NameThatColor\ColorInterpreter;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('layouts.dashboard.products.index', [
            'products'=> Products::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.dashboard.products.create', [
            'categories'=> Category::get(['id', 'category_name'])
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            '*' => 'required',
        ]);

        $product = Products::create($request->except('_token') + [
            'created_at'=> Carbon::now(),
        ]);

        if($request->hasFile('thumbnail')){
            $new_name = $product->name.time() . "." . $request->file('thumbnail')->getClientOriginalExtension();
            $img =Image::make($request->file('thumbnail'))->resize(300, 300);
            $img->save(base_path('public\uploads\thumbnail_photos/' . $new_name), 80);
    
            Products::find($product->id)->update([
                'thumbnail'=> $new_name,
                'updated_at'=> null
            ]);
            
        }

        return redirect()->route('products.create');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $products)
    {
        $user = Products::find($products);
        return view('layouts.dashboard.products.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $products)
    {

        return view('layouts.dashboard.products.edit',[
            'user'=> Products::find($products),
            'categories'=> Category::get(['id', 'category_name']),
            'sizes' => Variation::all(),
            'colors' => Color::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $request->validate([
            '*' => 'required',
        ]);

        $size = implode(',' , $request->variation);
        $color = implode(',' , $request->colors);


        if($request->hasFile('thumbnail')){

            unlink(base_path('public/uploads/thumbnail_photos/' . Products::find($id)->thumbnail ));

            $new_name = $request->name.time() . "." . $request->file('thumbnail')->getClientOriginalExtension();
            $img =Image::make($request->file('thumbnail'))->resize(300, 300);
            $img->save(base_path('public\uploads\thumbnail_photos/' . $new_name), 80);

            Products::find($id)->update([
                'thumbnail'=> $new_name,
                'updated_at'=> Carbon::now()
            ]);
        }
        else
        {
            Products::find($id)->update($request->except('_token') + [
                'variation' => $size,
                'colors' => $color,
                'updated_at'=> Carbon::now()
            ]);
        }

        return redirect()->route('products.edit', $id);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $products)
    {
        Products::findOrFail($products)->delete();
        // unlink(base_path('public/uploads/thumbnail_photos/'.Products::find($products)->thumbnail));
        return back()->with('cate_deleted', "ID " . $products . " Category Deleted");
    }

    
    // Products Trash Route index
    public function product_trash()
    {
        return view('layouts.dashboard.trash.product_trash_index', [
            'products'=>Products::onlyTrashed()->get(),
            'delete'=>Products::onlyTrashed()->pluck('deleted_at'),
        ]);
    }

    // Products Trash Route Show
    public function product_trash_details(string $id)
    {
        $user = Products::withTrashed()->find($id);
        return view('layouts.dashboard.trash.product_trash_show', compact('user'));
    }

      // Category Trash Route restore
    public function product_trash_restore(string $id)
    {
        Products::withTrashed()->find($id)->restore();
        Products::withTrashed()->find($id)->update([
            'deleted_at'=>null,
        ]);
        return redirect('trash/product');
    }

    // Category Trash Route Permanent Delete
    public function product_trash_delete(string $id)
    {
        Products::withTrashed()->find($id)->forceDelete();
        return redirect('trash/product');
    }

     // Category Trash Route Empty Trash
    public function empty_product_trash()
    {
        Products::onlyTrashed()->forceDelete();
        return redirect('products');
    }

     // Category Trash Route Empty Trash
    public function restore_product_trash()
    {
        Products::onlyTrashed()->restore();
        return redirect('products');
    }

        //Product page Routes

    public function productDetails($id){

        $products = Products::findOrFail($id);
        $releted_product = Products::where('category_id', $products->category_id)->where('id', '!=', $id)->get();
        $sizes = explode(',', $products->variation);
        $replece_size = str_replace(['"', '[', ']'], '', $sizes);
        $colors = explode(',', $products->colors);
        $replece_color = str_replace(['"', '[', ']'], '', $colors);
        $color_name = new ColorInterpreter();
        return view('layouts.dashboard.products.productDetails', compact('products', 'releted_product', 'replece_size', 'replece_color', 'color_name'));

        // return Category::where('Category_Slug', $Category_Slug)->exists();
        // return  Products::where('name', $product_name)->first();

        // if(Category::where('Category_Slug', $Category_Slug)->exists())
        // {
        //     if(Products::where('name', $product_name)->exists())
        //     {
        //         $product = Products::where('name', $product_name)->first();
        //         return view('layouts.dashboard.products.productView', compact('product'),[
        //             'products'=>Products::all(),
        //         ]);
        //     }else
        //     {
        //         return 'Error With Product Page';
        //     }
        // }else
        // {
        //     return 'Error With Category Name';
        // }

    }
        
        // return view('layouts.dashboard.products.product.page', compact('product'));
}