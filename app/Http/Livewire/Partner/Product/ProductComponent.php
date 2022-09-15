<?php

namespace App\Http\Livewire\Partner\Product;

use App\Models\Category;
use App\Models\CategoryPartner;
use App\Models\livewireTeste;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads as LivewireWithFileUploads;
use Symfony\Component\Console\Input\Input;
use Livewire\WithPagination;

class ProductComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    use LivewireWithFileUploads;
    public $status;
    public $product_name, $description;
    public $product_id, $category_id;
    public $discount;
    public $category_name, $newCategory, $selCategory;
    public $photo;
    public $price;
    public $newPrice, $percent;
    public $tab = 1;

public $testeproduto;

    public function render()
    {
        //$this->testeSave();
        $categories = CategoryPartner::with('products')->whereHas('products')->where('store_id', Auth::guard('partner')->user()->stores->first()->id)->get();

        $allProducts= Product::with('category')->where('store_id', Auth::guard('partner')->user()->stores->first()->id)->orderBy('name')->paginate(10);

        $modalCategories = CategoryPartner::with('products')->where('store_id', Auth::guard('partner')->user()->stores->first()->id)->get();
        return view('livewire.partner.product.product-component', ['products' => $products = Product::get(), 'categories' => $categories, 'modalCategories' => $modalCategories, 'allProducts' => $allProducts])->layout('layouts.painel-partner');
    }

    public function updateStatusProduct($products_id)
    {
        $setStatus = Product::find($products_id);

        if($setStatus->status == 'Ativo'){
            $newStatus = "Inativo";
        }else{
            $newStatus = "Ativo";
        }

        $setStatus->status = $newStatus;
        $setStatus->save();
        $this->statusProduct = $newStatus;

    }
    public function updateStatusCategory($category_id)
    {
        $setStatus = CategoryPartner::find($category_id);

        if($setStatus->status == 'Ativo'){
            $newStatus = "Inativo";
        }else{
            $newStatus = "Ativo";
        }

        $setStatus->status = $newStatus;
        $setStatus->save();
        $this->status = $newStatus;
    }

    public function deleteProduct($products_id)
    {
        $this->product_id = $products_id;
    }


    public function destroyProduct()
    {
        $product = Product::find($this->product_id)->delete();
        session()->flash('message','Produto excluido com sucesso!');
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('close-alert');
    }

    public function deleteCategory($category_id)
    {
        $this->category_id = $category_id;
    }

    public function destroyCategory()
    {

        $category = CategoryPartner::find($this->category_id);

        Product::where('category_partner_id', $this->category_id)->update([
            'category_partner_id' => 0,
        ]);

        CategoryPartner::find($this->category_id)->delete();

        session()->flash('message','Categoria excluida com sucesso!');
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('close-alert');

    }

    public function addDiscount()
    {
        $this->validate([
            'price' => 'required',
        ]);
        $this->discount = true;

        $this->dispatchBrowserEvent('maskDiscount');
    }

    public function sumDescount()
    {
        if($this->newPrice == ''){
            $this->percent =  '0%';
        }else{
            $this->percent = '0%';
          $this->percent =  number_format((( strtr($this->price, ',', '.') - strtr($this->newPrice, ',', '.') ) * 100) / strtr($this->price, ',', '.'),3,'.', ' ');
        }
    }

    public function calPercent()
    {
        if($this->percent == ''){
            $this->newPrice = '0,00';
        }else{
        $this->newPrice = '0,00';
        $this->newPrice =  strtr($this->price, ',', '.') - (( $this->percent * strtr($this->price, ',', '.') ) / 100);
        $this->newPrice = number_format($this->newPrice, 2,',', ' ');
        $this->dispatchBrowserEvent('maskDiscount');

        }



    }
    public function removeDiscount()
    {
        $this->discount = false;
        $this->newPrice = '';
        $this->percent = '';
        //dd($this->discount);
    }

    protected $listeners = ['resetModal', 'tab'];

    public function resetModal($item)
    {
        //dd($item);
        if($item == "category"){
            $this->category_name = '';
        }elseif($item == "product"){
            $this->photo = '';
            $this->selCategory ='';
            $this->newCategory = null;
            $this->product_name  = '';
            $this->description = '';
            $this->price = '';
            $this->removeDiscount();
            $this->newCategory = null;
            $this->percent = '';
        }

        //dd($this->newCategory);
    }

    public function tab($item)
    {
        if($item == 'categories'){

            $this->tab = 1;
        }elseif ($item == 'allProducts'){
            $this->tab = 2;
        }
    }

    protected function rules()
    {
        return [
            'selCategory' => 'required',
            'product_name' => 'required',
            'price' => 'required',
        ];
    }
    public function updated($fields)
    {
        $this->validateOnly($fields);
    }
    public $all;
    public function saveProduct()
    {

/*         for($c=0; $c < count($this->items); $c++ ){
            livewireTeste::create([
                            'number' => $this->items[$c]['name'],
                            'name' => $this->items[$c]['qtdProduct'],
                        ]);
                        /* 'id' => $product->id, 'name' => $product->name, 'qtdProduct' => 1  */
            /*}

        dd('teste salvo no banco de dados'); */
        $validatedData = $this->validate();
        //dd(strtr($validatedData['price'], ',', '.'));
        if($this->discount == null){
            $this->discount = 0.00;
        }

        if(isset($this->photo)){
            $photo = $this->photo->store('products', 'public');
        }else{
            $photo = null;
        }
        if(isset($this->newPrice)){
            $newPrice = $this->newPrice;
            //dd($newPrice);
        }else{
            $newPrice = 0.00;
        }

        /* $image = $this->photo->store('products', 'public'); */
        Product::create([
            'store_id' => '2',
            'category_partner_id' => $validatedData['selCategory'],
            'name' => $validatedData['product_name'],
            'description' => $this->description,
            'price' => strtr($validatedData['price'], ',', '.'),
            'discount' => strtr($newPrice,',', '.'),
            'image' => $photo,

        ]);


        session()->flash('message','Produto cadastrado com sucesso!');

        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('close-alert');

        //$this->resetInput();
        $this->resetModal('product');

    }
    public function updateProduct()
    {
        $validatedData = $this->validate();
        $product = Product::find($this->product_id);
        if($this->discount == null || $this->discount == ""){
            $this->discount = 0.00;
        }
        if(isset($this->photo)){
            $photo = $this->photo->store('products', 'public');
            File::delete('storage/'.$product->image);
        }elseif(isset($this->imageBd)){
            $photo = $this->imageBd;
        }else{
            $photo = null;
        }
        if($this->newPrice != null){
            $newPrice = $this->newPrice;
        }else{
            $newPrice = 0.00;
        }

        //dd($this->newPrice);

         Product::where('id', $this->product_id)->update([
            'store_id' => '2',
            'category_partner_id' => $validatedData['selCategory'],
            'name' => $validatedData['product_name'],
            'description' => $this->description,
            'price' => strtr($validatedData['price'], ',', '.'),
            'discount' => strtr($newPrice, ',', '.'),
            'image' => $photo,
        ]);




        session()->flash('message','Produto atualizado com sucesso!');

        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('close-alert');

        //$this->resetInput();
        $this->resetModal('product');


    }

    public $imageBd;
    public function editProduct($products_id)
    {
        $this->product_id = $products_id;
        $product = Product::find($products_id);

        $this->imageBd = $product->image;
        $this->photo = null;
        $this->selCategory = $product->category_partner_id;
        $this->product_name = $product->name;
        $this->description = $product->description;
        $this->price = strtr($product->price, '.', ',');
        $this->newPrice = strtr($product->discount, '.', ',');
        if($this->newPrice > 0)
        {
            $this->addDiscount();
            $this->sumDescount();
        }

        //dd($this->category_id);
    }

    public function selectImage()
    {
        $this->dispatchBrowserEvent('openPathImage');
    }

    public function resetBdImage()
    {
        $this->imageBd = null;
    }


    public function saveCategory()
    {

        $this->validate([
            'category_name' => 'required',
        ]);

        $newCategory = CategoryPartner::create([
            'store_id' => Auth::guard('partner')->user()->stores->first()->id,
            'name' => $this->category_name,
        ]);
        $this->selCategory = $newCategory->id;
        $this->resetModal('category');
        $this->dispatchBrowserEvent('open-modal');

    }

    public function editCategory($category_id)
    {

        $category = CategoryPartner::find($category_id);
       //dd($category);

        $this->category_name = $category->name;
    }

    public function updatedPhoto()
    {
        $this->validate([
            'photo' => 'image|max:1024',
        ]);
    }

    /* TESTE */
    public $product_component_id;
    public $items = [];

/*     public function addP()
    {
        //dd($this->product_component_id);
        $product = Product::find($this->product_component_id);
        array_push($this->items, [ 'product_component_id' => $this->product_component_id, 'name' =>$product->name, 'image' => $product->image ]);
        //dd($this->items);
    }
 */
    public function removeText($index)
    {
        unset($this->items[$index]);
        $this->items = array_values($this->items);
    }

    /*  teste de gravação de array multiplo no banc de dados */
    public function testeSave()
    {
        $teste = [
            ['number' => '1',
            'name' => 'primeiro',],
            ['number' => '2',
            'name' => 'segundo',]
        ];

        //dd(count($teste)< 1);


        for($c=0; $c < count($teste); $c++ ){
            livewireTeste::create([
                            'number' => $teste[$c]['number'],
                            'name' => $teste[$c]['name'],
                        ]);
                        /* 'id' => $product->id, 'name' => $product->name, 'qtdProduct' => 1  */
            }
    }
    public function selProduct($product_id)
    {
        $product = Product::find($product_id);
        array_push($this->items, ['id' => $product->id, 'name' => $product->name, 'qtdProduct' => 1 ]);
        $this->dispatchBrowserEvent('close-modal');

        //dd($items);
    }
    public $qtdProduct;
    public function updatedItems($value, $key)
    {
        $index = preg_replace("/[^0-9]/", "", $key);

        $this->items[$index]["qtdProduct"] = $value;


    }
    /* FIM TESTE */
}
