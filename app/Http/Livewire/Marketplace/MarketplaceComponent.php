<?php

namespace App\Http\Livewire\Marketplace;

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
    public $searchAdress, $resSearch, $store_id;

    public function mount()
    {
    $this->resSearch = new Collection();
    }

    public function render()
    {
        $searchAdress = $this->searchAdress;
        if(Str::length($this->searchAdress)>0){
            //$res = City::where('name', 'like','%'.$this->searchAdress.'%')->get();
            $res = Estates::with(['cities' => function($qry) use ($searchAdress) { return $qry->where('name', 'like',"%$searchAdress%");}])->orWhere('name', 'like',"%$searchAdress%")->get();

        }else{
            $res =[];
        }

        /* Apresenta somente as lojas que tem o parceiro com o status ativo */
        $stores = Store::with(['partner' => function($qry){return $qry->where('status', 1)->get();}])->whereHas('partner')->get();

        return view('livewire.marketplace.marketplace-component',['res'=>$res, 'stores' => $stores]);
    }

    public function searchAdress()
    {

        $this->resSearch->push(new Product([Product::where('name', 'like','%'.$this->searchAdress.'%')->get()]));
    }

    public function showStore($store_id)
    {
        $id = $store_id;
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
