<?php

namespace App\Http\Controllers\Partner\Auth;

use App\Http\Controllers\Controller;
use App\Models\Address_partner;
use App\Models\Category;
use Illuminate\Http\Request;

class AddressPartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'cep' => ['required','max:255'],
            'street' => 'required',
            'number' => 'required',
            'district'=> 'required',
            'city'=> 'required',
            'state'=> 'required',
        ]);

        if ($validator->fails()) {
            return redirect("partner/register/endereco/$request->id")
                    ->withErrors($validator)
                    ->withInput();
        }
        //dd($request);
        $address = Address_partner::create([
            'partner_id' => $request->id,
            'type' => "Comercial",
            'cep' => $request->cep,
            'street' => $request->street,
            'number' => $request->number,
            'district' => $request->district,
            'city' => $request->city,
            'state' => $request->state,
            'complement' => $request->complement,
        ]);

        $user = $request->id;

        return redirect()->route('partner.details.show', [$user, $address]);
        //return view('partner.auth.partner_store_details', compact('user', 'activities'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user)
    {
        return view('partner.auth.partner_address',compact('user'));
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
