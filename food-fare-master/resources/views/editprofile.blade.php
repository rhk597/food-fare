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
                <form class="form-horizontal" action="updateProfile" method="POST">
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

                        <div class="form-group">
                            <label for="company">Company</label>
                            <input type="text" value="{{(!empty($data->company)) ? $data->company : '' }}" class="form-control" id="company" name="company" placeholder="Patel Provision store" required>
                        </div>
                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" value="{{(!empty($data->password)) ? $data->password : '' }}" id="password" name="password" placeholder="Password" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="city">City</label>
                                <input type="text" class="form-control" value="{{(!empty($data->city)) ? $data->city : '' }}" name="city" id="city" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="state">State</label>
                                <select id="state" class="form-control" name="state">
                                    <option  value='Delhi' selected>Delhi</option>
                                    <option value='Gujarat' {{(!empty($data->state) && $data->state=='Gujarat') ? 'selected' : '' }}>Gujarat</option>
                                    <option value='Punjab' {{(!empty($data->state) && $data->state=='Punjab') ? 'selected' : '' }}>Punjab</option>
                                    <option value='Maharashtra' {{(!empty($data->state) && $data->state=='Maharashtra') ? 'selected' : '' }}>Maharashtra</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label for="security_question">Security Question</label>
                                <select id="security_question" class="form-control" name="sec_id">
                                    <option value='1'selected>what is the name of your pet?</option>
                                    <option value='2' {{(!empty($data->sec_id) && $data->sec_id==2) ? 'selected' : '' }}>what is your nick name?</option>
                                    <option value='3' {{(!empty($data->sec_id)&& $data->sec_id==3) ? 'selected' : '' }}>what is your mothers maiden name?</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="security_answer">Security Answer</label>
                                <input type="text" class="form-control" value="{{(!empty($data->sec_answer)) ? $data->sec_answer : '' }}" name="sec_answer" id="security_answer" required>
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
