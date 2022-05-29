<?php

namespace App\Http\Livewire\Ad;

use App\Http\Livewire\customeComponent;
use App\Models\Ad;
use Livewire\Component;

class Adlist extends customeComponent
{
    public $search;
    public $selectedAd=null;
    public $selectedAdToDelete=null;
    public $selectedAdToDeactive=null;
    protected $listeners=['edit', 'detele', 'deactive'];
    public function edit(Ad $ad){
        $this->selectedAd=$ad;
    }
    public function detele(Ad $ad){
        $this->selectedAdToDelete=$ad;
    }
    public function deactive(Ad $ad){
        $this->selectedAdToDeactive=$ad;
    }
    public function getAdsProperty(){
        return Ad::query()
        ->where('status','active')
        ->latest('id')
        ->paginate(10);
    }
    public function render()
    {
        $ads=$this->ads;
        return view('livewire.ad.adlist',compact('ads'));
    }
}
