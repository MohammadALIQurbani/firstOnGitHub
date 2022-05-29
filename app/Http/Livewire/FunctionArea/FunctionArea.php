<?php

namespace App\Http\Livewire\FunctionArea;

use App\Http\Livewire\customeComponent;
use App\Models\FunctionArea as ModelsFunctionArea;
use Livewire\Component;

class FunctionArea extends customeComponent
{
    public $selectedFunctionArea=null;
    public $search=null;
    public $selectedFunctionAreaToDelete=null;
    protected $listeners=['update','delete'];
    public function update(ModelsFunctionArea $functionArea){
        $this->selectedFunctionArea=$functionArea;
    }
    public function delete(ModelsFunctionArea $functionArea){
        $this->selectedFunctionAreaToDelete=$functionArea;
    }
    public function getFunctionAreasProperty(){
        return ModelsFunctionArea::query()
        ->when($this->search,function($functionArea){
            $functionArea->where('name','like',"%{$this->search}%");
        })
        ->latest('id')
        ->paginate(20);
    }
    public function render()
    {
        $functionAreas=$this->FunctionAreas;
        return view('livewire.function-area.function-area',compact('functionAreas'));
    }
}
