<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Date extends Component
{




    public function render()
    {

       

        $mytime = date('Y-m-d H:i:s');


    
        return view('livewire.date')->with(compact('mytime'));
    }
}
