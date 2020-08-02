@extends('layouts.app')
@section('content')

<div class="container">
  <div class="container">
      <div class=" card card-info">
          <div class="card-header">
              <h3 class="card-title text-center">Sign Up</h3>
          </div>
      
          <form class="form-horizontal" action="signUpSubmit" method="POST">
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
                          <label for="email">Email</label>
                          <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                      </div>
                      <div class="form-group col-md-6">
                          <label for="password">Password</label>
                          <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                      </div>
                  </div>

                  <div class="form-row">
                      <div class="form-group col-md-6">
                          <label for="firstname">First Name</label>
                          <input type="text" class="form-control" id="firstname" name="firstname" placeholder="John" required>
                      </div>
                      <div class="form-group col-md-6">
                          <label for="lastname">Last Name</label>
                          <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Doe" required>
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="company">Company</label>
                      <input type="text" class="form-control" id="company" name="company" placeholder="Patel Provision store" required>
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
                  <div class="form-row">
                      
                      <div class="form-group col-md-6">
                          <label for="security_question">Security Question</label>
                          <select id="security_question" class="form-control" name="sec_id">
                              <option value="1" selected>what is the name of your pet?</option>
                              <option  value="2">what is your nick name?</option>
                              <option  value="3">what is your mothers maiden name?</option>
                          </select>
                      </div>
                      <div class="form-group col-md-4">
                          <label for="security_answer">Security Answer</label>
                          <input type="text" class="form-control" name="sec_answer" id="security_answer" required>
                      </div>
                  </div>
              </div>
              <div class="card-footer">
                  <button type="submit"class="btn btn-info">Sign Up</button>
                  <hr>
                  <a href="/login">Go Back To Login Page</a>
                  <br>
              </div>
          </form>
      </div>
  </div>
</div>  
@endsection
@section('script')
@endsection
