<?php

namespace App\Http\Livewire\Marketplace;

use App\Models\Category;
use App\Models\City;
use App\Models\Estate;
use App\Models\Estates;
use App\Models\FavoriteStore;
use App\Models\Partner;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;

class MarketplaceComponent extends Component
{
    public $searchAdress, $resSearch, $store_id, $category_id, $selCategory;

    public function mount()
    {
    $this->resSearch = new Collection();
    }

    public function render()
    {
        $categories = Category::all();
        $searchAdress = $this->searchAdress;
        if(Str::length($this->searchAdress)>0){
            //$res = City::where('name', 'like','%'.$this->searchAdress.'%')->get();
            $res = Estate::with(['cities' => function($qry) use ($searchAdress) { return $qry->where('name', 'like',"%$searchAdress%");}])->orWhere('name', 'like',"%$searchAdress%")->get();

        }else{
            $res =[];
        }
        //$this->selCategory = "coxinha";
        /* Apresenta somente as lojas que tem o parceiro com o status ativo */
       // $stores = Store::with(['partner' => function($qry){return $qry->where('status', 1)->get();}])->whereHas('partner')->where('branch_of_activity' , 'like', '%'.$this->selCategory.'%')->get();

       $pesquisa = $this->selCategory;

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
        //dd($stores);


        return view('livewire.marketplace.marketplace-component',['res'=>$res, 'stores' => $stores, 'categories' => $categories]);
    }
    public function teste($category_id)
    {

        $category = Category::find($category_id);
        //dd($category->name_category);
        if($category == null){
            $this->selCategory = '';
        }else{

            $this->selCategory = $category->name_category;
        }

    }

    public function searchAdress()
    {

        $this->resSearch->push(new Product([Product::where('name', 'like','%'.$this->searchAdress.'%')->get()]));
    }

    public function selStore($store_id)
    {
        session()->put(['delivery' => '1']);
        $id = $store_id;
        return redirect()->route('store.marketplace.show',['id' => $id]);
        $this->store_id = $store_id;

    }
    public function showStore($item)
    {
        session()->put(['delivery' => $item]);
        $id = $this->store_id;
        return redirect()->route('store.marketplace.show',['id' => $id]);

    }

    public function favorite($store_id)
    {

        $favorite_store = Store::find($store_id);

        if(isset($favorite_store->Favorite)){
            $favorite_store->Favorite->delete();
        }else{
            FavoriteStore::create([
                'user_id' => Auth::user()->id,
                'store_id' => $favorite_store->id,
            ]);
        }

    }
}
