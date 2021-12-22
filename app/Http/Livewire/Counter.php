<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $count = 4;

    public function increment(){
        $this->count++;
    } 

    public function decrement() {

        $this->count--;
    }

    public function render()
    {
        return view('livewire.counter', ['count' => $this->count])   
        ->extends('layouts.app')
        ->section('content');
    }
}
