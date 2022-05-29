<?php

namespace App\Http\Livewire\PublicPost;

use App\Models\User;
use Livewire\Component;

class PostLists extends Component
{
    public function render()
    {
        $sliders=User::all();
        return view('livewire.public-post.post-lists',compact('sliders'));
    }
}
