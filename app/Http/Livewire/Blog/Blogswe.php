<?php

namespace App\Http\Livewire\Blog;

use App\Models\Blog;
use Livewire\Component;
use Livewire\WithPagination;
class Blogswe extends Component
{
    use WithPagination;
    public function render()
    {
        $blogs = Blog::paginate('2');
        $bloglastesw = Blog::latest()->orderBy('id','Asc')->paginate('4');
        return view('livewire.blog.blogswe',['blogs' => $blogs,'bloglastesw' => $bloglastesw]);
    }
}
