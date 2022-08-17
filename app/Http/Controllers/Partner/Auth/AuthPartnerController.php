<?php

namespace App\Http\Controllers\Partner\Auth;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthPartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('partner.auth.partner_login');
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
            'email' => 'required',
            'password' => 'required|min:3|max:10',
        ]);

        if ($validator->fails()) {
            return redirect('/partner/login')
                    ->withErrors($validator)
                    ->withInput();
        }

        $credentials = $request->only('email', 'password');
        $data = Partner::where('email', $request->email)->first();
        if($data->status == 0){
            return redirect('/partner/login')
                    ->withErrors(['NotPermission' => 'Ops, algo deu errado... Acho que você ainda não tem permissão para acessar esta área.'])
                    ->withInput();
        }
        if (Auth::guard('partner')->attempt($credentials)) {

            return redirect()->route('painel');
        }else{
            return redirect('/partner/login')
                    ->withErrors(['error' => 'Os dados informados não correspondem aos nossos registros.'])
                    ->withInput();
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function destroy(Request $request)
    {
        Auth::guard('partner')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('partner.login.index');
    }
}
