@extends('layouts.app')
@section('content')
@include('includes.header') 
<main>
<div class="container">
        <div class="container">
            <div class=" card card-info">
                <div class="card-header">
                    <h3 class="card-title text-center">Edit</h3>
                </div>
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
                <form class="form-horizontal" action="/updateAdminProfile" method="POST">
                    <div class="card-body">
					<input type="hidden" class="form-control" id="firstname" value="{{(!empty($data->srno)) ? $data->srno : '' }}" name="srno" placeholder="John" required>
                        <div class="form-row">
                            <div class="form-group col-md-6">
							<label for="firstname">First Name</label>
                                <input type="text" class="form-control" id="firstname" value="{{(!empty($data->firstname)) ? $data->firstname : '' }}" name="firstname" placeholder="John" required>
                            </div>
                            <div class="form-group col-md-6">
							<label for="lastname">Last Name</label>
                                <input type="text" class="form-control" id="lastname" value="{{(!empty($data->lastname)) ? $data->lastname : '' }}" name="lastname" placeholder="Doe" required>
                            </div>
                        </div>

                        <div class="form-row">

                            <div class="form-group col-md-6">
						
							<label for="password">Password</label>
                                <input type="password" class="form-control" value="{{(!empty($data->password)) ? $data->password : '' }}" id="password" name="password" placeholder="Password" required>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" name="Submit" class="btn btn-info">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
@section('script')
@endsection
