<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

/*         Auth::user()->cart;
        dd(Auth::user()->cart->sum('qtd')); */

        $carts = Cart::with('products')->get();

/*         foreach($carts as $cart)
        {
           foreach($cart->products as $product)
            {
                echo $product->name . "<br>";
            }
        } */

        return view('cart.cart', ['carts' => $carts]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $user_id = Auth::user()->id;
        $product = Product::find($request->product_id);
        $store_id = $product->store->id;

         $note = Cart::where('user_id',Auth::user()->id)->where('product_id', $request->product_id)->first();
            if(isset($note) && $note->product_id == $request->product_id){
                $note->qtd = ++$note->qtd;
                $note->price = str_replace(',', '.',$note->price) + str_replace(',', '.',$product->price);
                $note->save();
            }else{
                $cart = Cart::create([
                    'user_id' => $user_id,
                    'store_id' => $store_id,
                    'product_id'=> $product->id,
                    'qtd' => '1',
                    'price' => $product->price,
                ]);
            }
            return redirect()->back();
        //return redirect()->route('cart.index');
    }

    public function cartItemAdd(Request $request)
    {

        $note = Cart::where('user_id',Auth::user()->id)->where('product_id', $request->product_id)->first();
        $product = Product::find($request->product_id);
        //dd($note->price);
        $note->qtd = ++$note->qtd;
        $note->price = str_replace(',', '.',$note->price) + str_replace(',', '.',$product->price);
        $note->save();
        return redirect()->route('cart.index');
    }

    public function cartItemSubtract(Request $request)
    {

        //dd($request);
        $note = Cart::where('user_id',Auth::user()->id)->where('product_id', $request->product_id)->first();
        //dd($note);
        $product = Product::find($request->product_id);
        //dd($product);
        //dd($note->qtd);
        if($note->qtd == 1){

            $note = Cart::where('product_id', $request->product_id);
            //dd($request->product_id);
            $note->delete();

        }else{
            $note->qtd = --$note->qtd;
            $note->price = str_replace(',', '.',$note->price) - str_replace(',', '.',$product->price);
            $note->save();

        }

        return redirect()->route('cart.index');
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
