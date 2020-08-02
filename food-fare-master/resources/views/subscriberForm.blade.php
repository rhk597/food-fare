@extends('layouts.app')
@section('content')
<div class="container">
    <table class="table table-striped">
       <tbody>
          <tr>
             <td colspan="1">
                <form class="well form-horizontal" id="myForm">
                    <div id="error" style="margin-left: 35%;"></div>
                   <fieldset>
                      <div class="form-group">
                         <label class="col-md-4 control-label">Full Name</label>
                         <div class="col-md-8 inputGroupContainer">
                            <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="name" name="fullName" placeholder="Full Name" class="form-control" required="true" value="" type="text"></div>
                         </div>
                         <small id="error_name" class="form-text text-danger"></small>
                      </div>
                      <div class="form-group">
                         <label class="col-md-4 control-label">Email</label>
                         <div class="col-md-8 inputGroupContainer">
                            <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span><input id="email" name="email" placeholder="Email" class="form-control" required="true" value="" type="email"></div>
                         </div>
                         <small id="error_email" class="form-text text-danger"></small>
                      </div>
                      <div class="form-group">
                         <label class="col-md-4 control-label">Mobile Number</label>
                         <div class="col-md-8 inputGroupContainer">
                            <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span><input id="mobile" name="mobileNumber" placeholder="Mobile Number" class="form-control" required="true" value="" type="text"></div>
                         </div>
                         <small id="error_mobile_no" class="form-text text-danger"></small>
                      </div>
                      <div class="form-group">
                        <label class="col-md-4 control-label">Gender</label>
                      
                         <div class="col-md-8 inputGroupContainer">
                            <div class="input-group">
                               <span class="input-group-addon" style="max-width: 100%;"><i class="glyphicon glyphicon-list"></i></span>
                               <select class="selectpicker form-control" id="gender" name="gender">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="transgender">Transgender</option>
                               </select>
                            </div>
                         </div>
                          <small id="error_gender" class="form-text text-danger"></small>
                      </div>
                      <div class="form-group">
                        <label class="col-md-4 control-label">Address Line 1</label>
                        <div class="col-md-8 inputGroupContainer">
                           <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input id="addressLine1" name="addressLine1" placeholder="Address Line 1" class="form-control" required="true" value="" type="text"></div>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-md-4 control-label">Address Line 2</label>
                        <div class="col-md-8 inputGroupContainer">
                           <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input id="addressLine2" name="addressLine2" placeholder="Address Line 2" class="form-control" required="true" value="" type="text"></div>
                        </div>
                        <small id="error_address_line_2" class="form-text text-danger"></small>
                     </div>
                     <div class="form-group">
                        <label class="col-md-4 control-label">City</label>
                        <div class="col-md-8 inputGroupContainer">
                           <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input id="city" name="city" placeholder="City" class="form-control" required="true" value="" type="text"></div>
                        </div>
                        <small id="error_city" class="form-text text-danger"></small>
                     </div>
                     <div class="form-group">
                        <label class="col-md-4 control-label">State</label>
                        <div class="col-md-8 inputGroupContainer">
                           <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input id="state" name="state" placeholder="State" class="form-control" required="true" value="" type="text"></div>
                        </div>
                        <small id="error_state" class="form-text text-danger"></small>
                     </div>
                     <div class="form-group">
                        <label class="col-md-4 control-label">ZIP Code</label>
                        <div class="col-md-8 inputGroupContainer">
                           <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input id="postcode" name="postcode" placeholder="ZIP Code" class="form-control" required="true" value="" type="text"></div>
                        </div>
                        <small id="error_zipcode" class="form-text text-danger"></small>
                     </div>
                     <div class="form-group">
                        <label class="col-md-4 control-label">Country</label>
                        <div class="col-md-8 inputGroupContainer">
                           <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input id="country" name="country" placeholder="Country" class="form-control" required="true" value="" type="text"></div>
                        </div>
                        <small id="error_country" class="form-text text-danger"></small>
                     </div>
                   </fieldset>
                   <input type="hidden" id="id" name="id" value="">
                   <button type="submit" style="align:center;" class="btn btn-primary">Submit</button>
                </form>
             </td>
          </tr>
       </tbody>
    </table>
 </div> 
@endsection
@section('script')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': '{{{Session::token()}}}'
        }
    });
    $(document).ready(function() {
        var pathname = window.location.pathname;
        $.ajax({
            url: 'api'+pathname,
            type: 'get',
            dataType: 'json',
            success:function(response){
                subscriber=response.data;
                $('#id').val(subscriber.id);
                $('#name').val(subscriber.name);
                $('#email').val(subscriber.email);
                $('#mobile').val(subscriber.mobile_no);
                $('#gender').val(subscriber.gender);
                $('#addressLine1').val(subscriber.address_line_1);
                $('#addressLine2').val(subscriber.address_line_2);
                $('#city').val(subscriber.city);
                $('#postcode').val(subscriber.zipcode);
                $('#state').val(subscriber.state);
                $('#country').val(subscriber.country);
                
                localStorage.setItem("email", subscriber.email);
                localStorage.setItem("mobile", subscriber.mobile_no);

            }
        });

    });
$("#myForm").submit(function(event) {
    $("#error").empty();
    /* stop form from submitting normally */
    var apiUrl = ( window.location.pathname == "/create-subscriber") ? "createsubscriber" : "updatesubscriber";
    event.preventDefault();
    $.ajax({
        type: "POST",
        url: "/api/"+apiUrl, 
        data:  {
            'id' : $('#id').val(),
            'name' :$('#name').val(),
            'email' :((localStorage.getItem("email") != $('#email').val()) || (apiUrl == 'createsubscriber' )) ? $('#email').val() : '',
            'mobile_no' :((localStorage.getItem("mobile") != $('#mobile').val()) || (apiUrl == 'createsubscriber' )) ? $('#mobile').val() : '',
            'gender' :$('#gender').val(),
            'address_line_1' :$('#addressLine1').val(),
            'address_line_2' : $('#addressLine2').val(),
            'city' : $('#city').val(),
            'zipcode' : $('#postcode').val(),
            'state' : $('#state').val(),
            'country' : $('#country').val(),
        },
        success: function(response) {
            localStorage.removeItem("email");
            localStorage.removeItem("mobile");
            alert(response.data);
            window.location.href = "/demo";
        },
        error: function(response) {
            if(response.status=='422'){
            var errors = JSON.parse(response.responseText);
            errorData='';
            $.each(errors.cause.split(','), function (key, val) {
                errorData+='<small class="form-text text-danger">'+val+'</small><br>';
            });
            $("#error").append(errorData);
            }
      
        }
    });

});

</script>
@endsection
