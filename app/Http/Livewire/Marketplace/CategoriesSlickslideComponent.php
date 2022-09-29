<?php

namespace App\Http\Livewire\Marketplace;

use App\Models\Category;
use Livewire\Component;

class CategoriesSlickslideComponent extends Component
{
    public function render()
    {
        $categories = Category::all();
        return view('livewire.marketplace.categories-slickslide-component', ['categories' => $categories]);
    }
    public function teste($category_id)
    {
        $category = Category::find($category_id);
        dd($category->name_category);
    }


}
