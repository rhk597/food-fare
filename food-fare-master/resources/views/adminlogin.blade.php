@extends('layouts.app')
@section('content')
<div class="container">
    <div class="container">
        <div class=" card card-info">
            <div class="card-header">
                <h3 class="card-title text-center">Admin Login</h3>
            </div>
            <form class="form-horizontal" method="POST" action="/adminSubmit">
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
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Sign in</button>
                    <hr>
                    <a href="/login">User Login</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('script')
@endsection



