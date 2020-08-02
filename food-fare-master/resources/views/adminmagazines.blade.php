@extends('layouts.app')
@section('content')
@include('includes.adminheader') 
<div class="container">
    <div class="container">
        <div class=" card card-info">
            <div class="card-header">
                <h3 class="card-title text-center">Add New Magazine</h3>
            </div>
            <form class="form-horizontal" action="/adminMagazine" method="POST" enctype="multipart/form-data" id="form1">
                <div class="card-body">

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="event_title">Magazine Title</label>
                            <input type="text" class="form-control" id="firstname" name="title" placeholder="Bake Show" required>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="details">Details</label>
                        <textarea class="form-control" form="form1" id="details" name="desc" placeholder="Enter details" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="date">Date:</label>
                        <input type="datetime-local" id="date" name="date" required>
                    </div>
                    <div class="form-group">
                        <input type="file" name="file" id="fileToUpload" accept=".doc,.pdf,.docx"  required>
                    </div>

                </div>
                <div class="card-footer">
                    <button type="submit" name="Submit" class="btn btn-info">Add Magazine</button>
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
