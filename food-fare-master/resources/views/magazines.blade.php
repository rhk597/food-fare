@extends('layouts.app')
@section('content')
@include('includes.header') 
<main>
    <div class="container">
        <h1 class="text-center"> Magazines</h1>
        <br>
        <div class="dropdown float-right">
            <select class="form-control" id="sel1">
                <option  value='new'>New Magazines</option>
                <option value='old'>Old Magazines</option>
                <option value='atoz'>A TO Z</option>
              </select>
        </div>
        <br>
        <br>
        <div class="row" id='magazines'>
          
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
        
        magazineData('/magazinedata');

    });
    $('#sel1').on('change', function() {
        magazineData('/listingdata/'+this.value+'/magazine');
});
function magazineData(listingUrl){
    $("#magazines").empty();
    $.ajax({
        url: listingUrl,
        type: 'get',
        dataType: 'json',
        success:function(response){
            events=response.data;
            data='';
            if(events.length > 0 ){
                for(ii=0;ii < events.length;ii++){
             
                    data+="<div class='col-sm-4 col-md-4 col-lg-4'><div class='card'><div class='card-header'><h5 class='card-title'>"+events[ii]['title']+"</h5></div><div class='card-body'><p class='card-text'>"+events[ii]['desc']+"</p></div><div class='card-footer'><a href="+'/storage/'+events[ii]['magazines_path']+" class='btn btn-primary'>Download PDF <i class='fa fa-file-pdf-o' aria-hidden='true'></i></a></div></div></div>";    
                } 
            }else{
                data='<i style="margin-left: 40%;">NO EVENT ORGANIZED</i>';
            }
            $("#magazines").append(data);

        }
    });
}
</script>
@endsection
