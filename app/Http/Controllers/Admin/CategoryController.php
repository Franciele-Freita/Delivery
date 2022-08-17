<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::get();
        $tab = 1;
        return view('admin.category.categories', compact('categories', 'tab'));
    }

    public function erroindex()
    {
        $categories = Category::get();
        /* Recebe o valor da tab 2 do controller store se houver erro */
        $tab = 2;
        return view('admin.category.categories', compact('categories', 'tab'));
    }

    public function registerIndex()
    {
        return view('admin.category.Register_categories');
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
            'img_category' => 'required',
            'name_category' => 'required',
        ]);
        $tab = 2;
        if ($validator->fails()) {
            return redirect("/admin/categoria/register")
                    ->with($tab)
                    ->withErrors($validator)
                    ->withInput();
        }

        if($request->hasFile('img_category') && $request->file('img_category')->isValid()){
            $requestImage =  $request->img_category;
            $extension = $requestImage->extension();
            $imageName = md5( $requestImage->getClientOriginalName() . strtotime("now")). "." . $extension;
            $requestImage->move(public_path('img/admin/icon'), $imageName);
        }


        Category::create([
            'img_category' => $imageName,
            'name_category' => $request->name_category,
        ]);

        return redirect('/admin/categoria/register');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd($id);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $categories = Category::findOrFail($id);
        $categories = Category::get();

        return redirect('/categoria/register', compact('categories'));
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

        $category =  Category::find($request->id);
        //dd($request);

        if($request->hasFile('img_edit_category') && $request->file('img_edit_category')->isValid()){
            File::delete(public_path("img/admin/icon/{$category->img_category}"));
            $requestImage =  $request->img_edit_category;
            $extension = $requestImage->extension();
            $imageName = md5( $requestImage->getClientOriginalName() . strtotime("now")). "." . $extension;
            if($imageName == ''){
            }else{
            $requestImage->move(public_path('img/admin/icon'), $imageName);
            $category->img_category = $imageName;
            }
        }







        $category->name_category = $request->name_edit_category;
        $category->save();

        return redirect('/admin/categoria')->with('success','Categoria atualizada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $category = Category::find($request->id);

        $category->delete();

        File::delete(public_path("img/admin/icon/{$category->img_category}"));

        //$msg = "Categoria excluida com sucesso";

        return redirect('/admin/categoria')->with('success','Categoria excluida com sucesso');
    }
}
