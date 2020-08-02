@extends('layouts.app')
@section('content')
<div class="container">
  <div class=" card card-info">
      <div class="card-header">
          <h3 class="card-title text-center">Login</h3>
      </div>
      <form class="form-horizontal" action="/loginSubmit" method="POST">
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
              <p style="color:red;font-weight:bold">
              </p>
              <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail3" name="email" placeholder="Email">
                  </div>
              </div>
              <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                  <div class="col-sm-10">
                      <input type="password" class="form-control" id="inputPassword3" name="password" placeholder="Password">
                  </div>
              </div>
          </div>
          <div class="card-footer">
              <button type="submit" class="btn btn-info">Sign in</button>
              <a href="/signup" class=" btn btn-info">Sign Up</a>
              <a href="/forgetpassword" class="float-right">Forgot Password</a>
              <hr>
              <a href="/admin/login">Management Login</a>
              <br>
          </div>
      </form>
  </div>
</div> 
@endsection
@section('script')
@endsection
