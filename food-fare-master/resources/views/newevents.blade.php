@extends('layouts.app')
@section('content')
@include('includes.header') 
<main>
<div class="container">
    <h1 class="text-center"> Food Fairs</h1>
    <br>
    <div class="dropdown float-right">
        <select class="form-control" id="sel1">
            <option  value='new'>New Fairs</option>
            <option value='old'>Old Fairs</option>
            <option value='atoz'>A TO Z</option>
          </select>
    </div>
    <br>
    <br>
    <div class="row" id='events'>
        <!--this needs to rotate for multiple event-->
    </div>
</div>
</main>
@endsection
@section('script')
<style> 
    div.card {
        margin-bottom: 4%;

    }
</style>
<script>
    $(document).ready(function() {
        eventData('/eventsdata');

});
$('#sel1').on('change', function() {
  eventData('/listingdata/'+this.value+'/event');
});
function eventData(listing){
    $("#events").empty();
    $.ajax({
        url: listing,
        type: 'get',
        dataType: 'json',
        success:function(response){
            events=response.data;
            data='';
            if(events.length > 0 ){
                for(ii=0;ii < events.length;ii++){
                    data+="<div class='col-sm-6 col-md-6 col-lg-6'><div class='card'><div class='card-header'><h5 class='card-title'>"+events[ii]['title']+"</p></h5></div><div class='card-body'><p class='card-text'>"+events[ii]['desc']+"</p><p>"+events[ii]['city']+"</p><p>"+events[ii]['state']+"</p><p>"+events[ii]['event_date']+"</p></div><div class='card-footer'><form action='/registerevent' method='post'><input type='hidden' name='event_id' value='"+events[ii]['id']+"'/><button class='btn btn-primary' type='submit'>Register Here</button></form></div></div></div>";    
                } 
            }else{
                data='<i style="margin-left: 40%;">NO EVENT ORGANIZED</i>';
            }
            $("#events").append(data);

        }
    });
}
</script>
@endsection
