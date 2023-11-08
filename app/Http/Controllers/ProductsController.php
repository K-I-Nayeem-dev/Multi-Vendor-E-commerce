<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Products;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\String_;

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

        Products::create($request->except('_token') + [
            'created_at'=> Carbon::now(),
            'updated_at'=> null
        ]);

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
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $products)
    {
        $request->validate([
            '*' => 'required',
        ]);

        Products::find($products)->update($request->except('_token') + [
            'updated_at'=> Carbon::now()
        ]);

        return redirect()->route('products.edit', $products);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $products)
    {
        Products::findOrFail($products)->delete();
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

}
