<?php

namespace App\Http\Livewire\Shop;

use App\Models\Prodect;
use Livewire\Component;
use Livewire\WithPagination;
class Shoppin extends Component
{
    use WithPagination;
    public $viewcount =12;
    public function changesize($size)
    {
        $this->viewcount = $size;
    }
    public function render()
    {
        $shops = Prodect::paginate($this->viewcount);
        return view('livewire.shop.shoppin',['shops'=>$shops]);
    }
}
