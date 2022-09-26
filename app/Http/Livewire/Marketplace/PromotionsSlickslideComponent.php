<?php

namespace App\Http\Livewire\Marketplace;

use Livewire\Component;

class PromotionsSlickslideComponent extends Component
{
    public $products;
    public function mounth($products)
    {
        $this->products = $products;
    }
    public function render()
    {
        return view('livewire.marketplace.promotions-slickslide-component');
    }
}
