@extends('layouts.app')
@section('content')
@include('includes.header') 
<main>
<div class="bg-img">
            <div class="container">

            </div>
            <div class="text-block">
                <h2>Welcome to our website</h2><br>
                <h4><i>FoodMarketI provides one of the best experience for the participants. </i></h4>
            </div>

        </div>
</main>
@endsection
@section('script')
<style>
        .container {
            position: absolute;
            margin: 20px;
            width: auto;
        }

        .text-block {
            color: gold;
            left: 0;
            position: absolute;
            text-align: center;
            top: 250px;
            width: 100%
        }
    </style>
@endsection