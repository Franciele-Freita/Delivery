<?php

namespace App\Http\Livewire\Partner\Category;

use App\Models\CategoryPartner;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $status, $category_name, $category_id;
    public function render()
    {

        $categories = CategoryPartner::where('store_id', Auth::user()->stores->first()->id)->orderBy('name')->paginate(7);
        return view('livewire.partner.category.category-component', ['categories' => $categories]);
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

    public function resetModal()
    {

            $this->category_name = '';

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
        $this->dispatchBrowserEvent('close-modal');

    }

    public function deleteCategory($category_id)
    {
        $this->category_id = $category_id;
    }

    public function destroyCategory()
    {
        $products = Product::where('category_partner_id', $this->category_id)->update([
            'category_partner_id' => '0',
        ]);

        CategoryPartner::find($this->category_id)->delete();

        session()->flash('message','Categoria excluida com sucesso!');
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('close-alert');
    }
}
