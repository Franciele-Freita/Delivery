<?php

namespace App\Http\Controllers\Partner\Category;

use App\Http\Controllers\Controller;
use App\Models\CategoryPartner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('partner.category.register');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = validator($request->all(), [
            'name' => 'required',

        ]);
        $tab = 2;
        if ($validator->fails()) {
            return redirect("/partner/category/register")
                    ->withErrors($validator)
                    ->withInput();
        }

        $store = Auth::guard('partner')->user()->stores->first();

        CategoryPartner::create([
            'name' => $request->name,
            'store_id' => $store->id,
            'status' => $request->status,
        ]);

        return redirect('/partner/category/register');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        $category = Auth::guard('partner')->user()->stores->first()->categories->where('name', $name)->first();

        return view('partner.category.register', ['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $category = Auth::guard('partner')->user()->stores->first()->categories->where('name', $request->name)->first();

        $category->name = $request->name;
        $category->status = $request->status;
        $category->save();
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
