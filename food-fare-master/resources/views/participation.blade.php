@extends('layouts.app')
@section('content')
@include('includes.header') 
<div class="container">
    <h1 class="text-center"> Participation</h1>
    <br>
    <br>
    <br>
    <div class="accordion" id="accordionExample">
        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Upcoming Fairs
                    </button>
                </h2>
            </div>

            <div id="collapseOne" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">

                    <div class="row">
                        <!--this needs to rotate for multiple event-->
                        @if(count($upcomming )> 0 )
                        @foreach ($upcomming as $item)
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">{{ $item->title }}</h5>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">{{ $item->desc }}</p>
                                </div>
                                <div class="card-footer">
                                    <input type="hidden" id='event_id'value="{{ $item->id }}" name="event_id"/>
                                    <button class="btn btn-primary" id='unregister'>Unregister Here</button>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_5">
                                        More Detail.
                                    </button>
                                    <div class="modal fade" id="modal_5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">{{ $item->title }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <b>Event Details :</b> {{ $item->desc }}<br>
                                                    <b>Event City :</b> {{ $item->city }}<br>
                                                    <b>Event State :</b> {{ $item->state }}<br>
                                                    <b>Event Date :</b> {{ $item->event_date }}<br>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif

                        
                        
                    </div>
                </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Past Participation
                    </button>
                </h2>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">


                    <div class="row">

                    @if(count($past_event )> 0 )
                    @foreach ($past_event as $item)
                     
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="card">

                                <div class="card-header">
                                    <h5 class="card-title">{{$item->title}}</h5>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">{{ $item->desc }}</p>
                                </div>
                                <div class="card-footer">
                                

                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_6">
                                        More Detail.
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="modal_6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">{{$item->title}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                   <b>Event Details :</b> {{ $item->desc }}<br>
                                                   <b>Event City :</b> {{ $item->city }}<br>
                                                   <b>Event State :</b> {{ $item->state }}<br>
                                                   <b>Event Date :</b> {{ $item->event_date }}<br>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @endif
                    </div>
                  
                </div>
            </div>
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
<script>
    $('#unregister').click(function(){
   
   
       $.ajax
       ({ 
           url: '/unregisterEvent',
           data: {"event_id": $('#event_id').val()},
           type: 'POST',
           success: function(result)
           {   
            location.reload();
           }
       });
   });
   </script>
@endsection
