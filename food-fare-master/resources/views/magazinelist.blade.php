@extends('layouts.app')
@section('content')
@include('includes.adminheader') 
<div class="container">
    <!-- TABLE: LATEST ORDERS -->
    <h1 class="text-center"> Fairs and Participants </h1>
    <br>
    <br>

    <div class="accordion" id="accordionExample">
        @foreach ($data as $event)
        <div class="card">
            <div class="card-header row" id="headingOne">
                <h2 class="mb-0 col-sm-6 col-md-6 col-lg-6">
                    <button class=" btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne{{$event['id']}}" aria-expanded="true" aria-controls="collapseOne">
                        {{  $event['title']  }}
                    </button>
                </h2>
				
				<a class="fa fa-file-o" style="font-size:32px;color:black;margin-right:50px;" href="/storage/{{ $event['magazines_path'] }}"></a>

                <p class="float-right col-sm-2 col-md-2 col-lg-2" style='margin-right:20px;'>{{ $event['date'] }}</p>
    			<a type="button" class="btn btn-primary" data-toggle="modal" href="deleteMagazine/{{ $event['id'] }}">
                    delete 
                </a>
        </div>
		</div>
	
        @endforeach
    </div>
</div>
@endsection
@section('script')
<style>
    div.card {
        margin-bottom: 4%;

    }
</style>
@endsection
