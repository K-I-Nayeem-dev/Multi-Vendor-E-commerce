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
}
