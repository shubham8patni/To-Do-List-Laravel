<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Step;

class EditStep extends Component
{

    public $steps = [];

    public function mount($steps)
    {
        $this->steps = $steps->toArray();
    }

    public function increment()
    {
        $this->steps[] = count($this->steps);
    }

    public function remove($i)
    {
        $step = $this->steps[$i];

        if(isset($step['id'])){
            Step::find($step['id'])->delete();
        }
        
        unset($this->steps[$i]);
     
    }



    public function render()
    {
        return view('livewire.edit-step');
    }
}


 
