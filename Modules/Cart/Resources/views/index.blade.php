@extends('cart::layouts.master')

@section('content')
    <h1> your Cart</h1>

    <button><a href="#">Shop more</a></button>


    <button ><a herf="{{route('cart.rv.check_out')}}">Check Out</a></button>


@endsection
