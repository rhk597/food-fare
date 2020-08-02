@extends('layouts.app')
@section('content')
@include('includes.adminheader') 
<div class="container">
    <div class="container">
        <div class=" card card-info">
            <div class="card-header">
                <h3 class="card-title text-center">Add new Fairs</h3>
            </div>
            <form class="form-horizontal" action="/adminEventSubmit" method="POST" id="form1">
                @if(!empty($errors))
                @php
                    $error=explode(",",$errors);
                @endphp
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul> 
                            @foreach ($error as $error1)
                                <li>{{ $error1 }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card-body">

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="event_title">Event Title</label>
                            <input type="text" class="form-control" id="firstname" name="event_title" placeholder="Bake Show" required>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="details">Details</label>
                        <textarea  class="form-control" form="form1" id="details" name="details" placeholder="Enter details" required></textarea>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="city">City</label>
                            <input type="text" class="form-control" name="city" id="city" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="state">State</label>
                            <select id="state" class="form-control" name="state">
                                <option selected>Delhi</option>
                                <option>Gujarat</option>
                                <option>Punjab</option>
                                <option>Maharashtra</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="date">Date:</label>
                        <input type="datetime-local" id="date" name="date" required>
                    </div>


                </div>
                <div class="card-footer">
                    <button type="submit" name="Submit" class="btn btn-info">Add Event</button>
                    <br>
                </div>
            </form>
        </div>
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
