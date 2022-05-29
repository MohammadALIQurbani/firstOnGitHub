<?php

namespace App\Http\Livewire\AdActive;

use App\Http\Livewire\customeComponent;
use App\Models\Ad;
use Livewire\Component;

class ActiveAd extends customeComponent
{
    public $search;
    public $selectedAd = null;
    public $selectedAdToDelete = null;
    public $selectedAdToActive = null;
    protected $listeners = ['edit', 'detele', 'active'];
    public function edit(Ad $ad)
    {
        $this->selectedAd = $ad;
    }
    public function detele(Ad $ad)
    {
        $this->selectedAdToDelete = $ad;
    }
    public function active(Ad $ad)
    {
        $this->selectedAdToActive = $ad;
    }
    public function getAdsProperty()
    {
        return Ad::query()
            ->where('status', 'deactive')
            ->latest('id')
            ->paginate(10);
    }
    public function render()
    {
        $ads = $this->ads;
        return view('livewire.ad-active.active-ad',compact('ads'));
    }
}
