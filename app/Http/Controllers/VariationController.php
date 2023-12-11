<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Variation;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VariationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('layouts.dashboard.variation.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.dashboard.variation.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'size'=>'required|alpha'
        ],[
            'size.required'=>'Variation filed canot be null',
            'size.alpha'=>'Variation field only accept Aphabet'
        ]);

        Variation::create($request->except('_token') + [
            'created_at'=> Carbon::now(),
            'updated_at'=> null,
        ]);
        return back()->with('variantion_store', 'Variation Store Successfully');
        // return explode(',' , json_encode($request->variations));
    }

    /**
     * Display the specified resource.
     */
    public function show(Variation $variation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Variation $variation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Variation $variation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Variation $variation)
    {
        //
    }
}
