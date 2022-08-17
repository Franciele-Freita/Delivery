<?php

namespace App\Http\Controllers\Marketplace;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\City;
use App\Models\Estates;
use App\Models\Note;
use App\Models\Partner;
use App\Models\Product;
use App\Models\Regions;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Foreach_;

class MarketplaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /* Avaliação do lojista */
    public function index()
    {
        $categories = Category::get();

        $partners = Partner::with('stores')->IsActive()
        ->get();
        $note = Note::select('note')->get();

/*         $notes = Store::with('notes')->get();
         */
        /* $note = Note::Where('store_id', 1)->select('note')->get(); */





        return view('welcome', ['categories' => $categories, 'partners' => $partners, 'note' => $note ]);
    }

    public function storeSearch(Request $request)
    {
        //dd($request->search);
        $categories = Category::get();
        //$products = Product::where('name', 'LIKE', "%{$request->search}%")
        //                    ->orWhere('description', 'LIKE', "%{$request->search}%")
        //                    ->get();

        //$partners = Partner::with('stores')->IsActive()->get('id');

        $pesquisa = $request->search;
        $stores = Store::join('partners as p','p.id','=','stores.partner_id')
                        ->with(['products' => function($qry) use($pesquisa){
                            return  $qry->where("name",'like',"%$pesquisa%")->orWhere('description','like',"%$pesquisa%");
                        }])
                        ->whereHas('products', function($qry) use($pesquisa){
                            return  $qry->where("name",'like',"%$pesquisa%")->orWhere('description','like',"%$pesquisa%");
                        })
                        ->orWhere('fantasy_name','like',"%$pesquisa%")
                        ->orWhere('branch_of_activity','like',"%$pesquisa%")
                        ->where('p.status',1)
                        ->select('stores.*')
                        ->get();

/*             if($stores->count() == 0){
                return "não tem loja";
            }else{
                return "tem loja";
            } */
            //dd($stores->count());
       # foreach()
        #->join('products as p','p.store_id','s.id')

/*           foreach($stores as $store)   {
            echo $store->fantasy_name;
            foreach($store->products as $product){
                echo '<br>';
                echo $product->name;
                echo '<br>';

            }
         }

        exit; */

       // foreach($products as $product){
        //   echo $product->name. "<br>";
       // }
        return view('marktplace.search',['categories' => $categories, 'stores'=> $stores, 'pesquisa' => $pesquisa]);
        /* return view('marketplace.search', ['stores'=> $stores]); */
    }

    public function location()
    {
        $regions = Regions::Paginate(5);

         return view('marktplace.location', ['regions' => $regions]);

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
    public function show($id)
    {

        $store = Store::where('id', $id)->first();




/*         foreach($store->categories as $category){
            echo $category->name;
            foreach($category->products as $product){
                echo $product->name;
            }
        } */

/*         $store = Store::where('id', $id)->first();
        $products = DB::table('product')->where('store_id', $id)->get(); */

        //dd($products);
        return view('marktplace.store', ['store' => $store]);
        //dd($store);
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
