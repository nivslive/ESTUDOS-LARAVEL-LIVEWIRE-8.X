@extends('layouts.bootstrap')
@section('content')


<div>
<button wire:click="increment">+</button>

<h1>{{$count}} </h1>
<button wire:click="decrement">-</button>

</div>

@endsection