<?php

namespace App\Http\Livewire\Partner\Product;

use App\Models\CategoryPartner;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads as LivewireWithFileUploads;
use Symfony\Component\Console\Input\Input;

class ProductComponent extends Component
{

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



    public function render()
    {

        $categories = CategoryPartner::with('products')->whereHas('products')->where('store_id', Auth::guard('partner')->user()->stores->first()->id)->get();
        $modalCategories = CategoryPartner::with('products')->where('store_id', Auth::guard('partner')->user()->stores->first()->id)->get();
        //dd( $categories);
        return view('livewire.partner.product.product-component', ['products' => $products = Product::get(), 'categories' => $categories, 'modalCategories' => $modalCategories]);
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
        dd("aqui");
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

        //dd($this->newPrice);
        $validatedData = $this->validate();

        if($this->discount == null){
            $this->discount = 0;
        }

        if(isset($this->photo)){
            $photo = $this->photo->store('products', 'public');
        }else{
            $photo = null;
        }
        if(isset($this->newPrice)){
            $newPrice = $this->photo->store('products', 'public');
        }else{
            $newPrice = '';
        }

        /* $image = $this->photo->store('products', 'public'); */
        Product::create([
            'store_id' => '2',
            'category_partner_id' => $validatedData['selCategory'],
            'name' => $validatedData['product_name'],
            'description' => $this->description,
            'price' => $validatedData['price'],
            'discount' => $newPrice,
            'image' => $photo,

        ]);


        session()->flash('message','Produto cadastrado com sucesso!');

        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('close-alert');

        //$this->resetInput();
        $this->resetModal('product');

    }
    public $imageBd;
    public function editProduct($products_id)
    {
        $product = Product::find($products_id);

        $this->imageBd = $product->image;
        $this->photo = null;
        $this->product_name = $product->name;
        $this->description = $product->description;
        $this->price = strtr($product->price, '.', ',');
        $this->newPrice = strtr($product->discount, '.', ',');
        if($this->newPrice != null || $this->newPrice > 0 || $this->newPrice != '' )
        {
            $this->addDiscount();
            $this->sumDescount();
        }
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
        $this->newCategory = $newCategory->name;
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
}
