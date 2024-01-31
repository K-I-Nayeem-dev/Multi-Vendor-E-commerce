<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Color;
use App\Models\Inventory;
use App\Models\ProductGallery;
use App\Models\Products;
use App\Models\Variation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('layouts.dashboard.products.index', [
            'products' => Products::where('user_id', auth()->id())->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.dashboard.products.create', [
            'categories' => Category::get(['id', 'category_name'])
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request->product_galleries;
        $request->validate([
            '*' => 'required',
        ]);
        
        $product = Products::create($request->except('_token', 'product_galleries') + [
            'user_id' => auth()->id(),
            'created_at'=> Carbon::now()
        ]);

        // Multiple Product Upload in Database

        foreach ($request->product_galleries as  $product_gallery) {
            $rand_id = rand(100000,999999);
            $new_name = $rand_id . time() . "." . $product_gallery->getClientOriginalExtension();
            $img = Image::make($product_gallery)->resize(460, 460);
            $img->save(base_path('public\uploads\product_gallery/' . $new_name), 80);

            ProductGallery::create([
                'user_id'=> auth()->id(),
                'product_id'=> $product->id,
                'multiImg' => $new_name,
                'created_at'=> Carbon::now(),
            ]);
        };



        // product Id Thumbnail upload

        if ($request->hasFile('thumbnail')) {
            $new_name = $product->name . time() . "." . $request->file('thumbnail')->getClientOriginalExtension();
            $img = Image::make($request->file('thumbnail'))->resize(460, 460);
            $img->save(base_path('public\uploads\thumbnail_photos/' . $new_name), 80);

            Products::find($product->id)->update([
                'user_id'=> auth()->id(),
                'thumbnail' => $new_name,
                'updated_at' => null
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
        return view('layouts.dashboard.products.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $products)
    {

        return view('layouts.dashboard.products.edit', [
            'user' => Products::find($products),
            'categories' => Category::get(['id', 'category_name']),
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

        if ($request->hasFile('thumbnail')) {

            unlink(base_path('public/uploads/thumbnail_photos/' . Products::find($id)->thumbnail));

            $new_name = $request->name . time() . "." . $request->file('thumbnail')->getClientOriginalExtension();
            $img = Image::make($request->file('thumbnail'))->resize(300, 300);
            $img->save(base_path('public\uploads\thumbnail_photos/' . $new_name), 80);

            Products::find($id)->update([
                'thumbnail' => $new_name,
                'updated_at' => Carbon::now()
            ]);
        } else {
            Products::find($id)->update($request->except('_token') + [
                'updated_at' => Carbon::now()
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
            'products' => Products::onlyTrashed()->get(),
            'delete' => Products::onlyTrashed()->pluck('deleted_at'),
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
            'deleted_at' => null,
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

    public function productDetails($id)
    {

        $products = Products::findOrFail($id);
        // $releted_product = Products::where('category_id', $products->category_id)->where('id', '!=', $id)->get();
        // $sizes = explode(',', $products->variation);
        // $replece_size = str_replace(['"', '[', ']'], '', $sizes);
        // $colors = explode(',', $products->colors);
        // $replece_color = str_replace(['"', '[', ']'], '', $colors);
        // $color_name = new ColorInterpreter();

        // $inventory_variation = Inventory::Where('product_id', $products->id)
        //                         ->Select('size_variation')
        //                         ->orderByraw('CHAR_LENGTH(size_variation) ASC')
        //                         ->distinct()
        //                         ->get();

        // foreach($inventory_variation as $variation){
        //     echo "<pre>";
        //     $size = $variation->size_variation;
        //     echo "</pre>";
        // }


        // ForLoop Color For Selected Size/Variation
        // for ($i=0; $i < count($inventory_variation) ; $i++) { 
        //         // echo "<pre>";
        //         $size = $inventory_variation[$i]->size_variation;
        //         // echo "</pre>";
        // }
        // echo $size;
        // return $inventory_variation[0]->size_variation;

        // die();
        // $inventory_color = Inventory::Where('product_id', $products->id)
        //                         ->Where('size_variation', $size)
        //                         ->Select('color')
        //                         ->orderBy('color', 'ASC')
        //                         ->distinct()
        //                         ->get();

        // return $inventory_color[0]->color;
        // return view('layouts.dashboard.products.productDetails', compact('products', 'releted_product', 'replece_size', 'replece_color', 'color_name', 'inventory_variation', 'inventory_color'));

        return view('layouts.dashboard.products.productDetails', compact('products'));

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
