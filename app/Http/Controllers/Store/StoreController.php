<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Partner\Auth\StoreDetails;
use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('partner.auth.partner_store_details');
    }

    public function welcome()
    {
       return view('partner.auth.welcome_partner');
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
            'partner' => 'required',
            'cpf' => 'required',
            'cnpj' => 'required',
            'corporate_name'=> 'required',
            'fantasy_name'=> 'required',
            'telephone'=> 'required',
            'branch_of_activity'=> 'required',
        ]);

        if ($validator->fails()) {
            return redirect("store/dados-loja/$request->id")
                    ->withErrors($validator)
                    ->withInput();

        }

        $user = Store::create([
            'partner_id' => $request->user_id,
            'address_id' => $request->address_id,
            'partner' => $request->partner,
            'cpf' => $request->cpf,
            'cnpj' => $request->cnpj,
            'corporate_name'=> $request->corporate_name,
            'fantasy_name'=> $request->fantasy_name,
            'telephone'=> $request->telephone,
            'branch_of_activity'=> $request->branch_of_activity,
        ]);



        return view('partner.auth.welcome_partner');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user, $address)
    {
        $activities = Category::get();
        return view('partner.auth.partner_store_details', compact('user', 'address', 'activities'));
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
    public function update(Request $request, $id)
    {
        //
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
