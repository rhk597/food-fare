@extends('layouts.app')
@section('content')
<div class="container">
    <div class="container">
        <div class=" card card-info">
            <div class="card-header">
                <h3 class="card-title text-center">Forgot Password</h3>
            </div>
            <form class="form-horizontal" action="forgetpasswordSubmit" method="POST">
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
                    <div class="form-group ">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" value="" name="email" placeholder="Email" required>
                        <button name="check" style='margin-top:4px;' class="btn btn-info reserve-button">Check</button>
                    </div>
                    <div class="form-group  icha0 d-none">
                        <label for="email" id="security_question">Here is your security Question</label><p class='question'></p>
                        <input type="text" class="form-control" id="ans" name="ans" placeholder="Your Answer" required>
                    </div>
                    <div class="form-group icha0  d-none">
                        <label for="password">New Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" name="Submit" class="btn btn-info">Reset Password</button>
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
<script>
 $('.reserve-button').click(function(){
	$(".icha0").addClass('d-none');
	$('.question').text("");

    $.ajax
    ({ 
        url: '/checkemail',
        data: {"email": $('#email').val()},
        type: 'post',
        success: function(result)
        {    if(result.error == true){ 
				alert(result.cause); 
			}else{ 
				$(".icha0").removeClass('d-none');
				$('.question').text(result.data.security_question);
			}
        }
	

		
    });
});
</script>
@endsection



