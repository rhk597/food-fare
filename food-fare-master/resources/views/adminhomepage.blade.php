@extends('layouts.app')
@section('content')
@include('includes.adminheader') 
<div class="container">
    <!-- TABLE: LATEST ORDERS -->
    <h1 class="text-center"> Fairs and Participants </h1>
    <br>
    <br>

    <div class="accordion" id="accordionExample">
        @foreach ($data as $event)
        <div class="card">
            <div class="card-header row" id="headingOne">
                <h2 class="mb-0 col-sm-8 col-md-8 col-lg-8">
                    <button class=" btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne{{$event['id']}}" aria-expanded="true" aria-controls="collapseOne">
                        {{  $event['title']  }}
                    </button>

                </h2>
                <p class="float-right col-sm-2 col-md-2 col-lg-2">{{ count($event['participates']) }} participants</p>
                <button type="button" class="btn btn-primary" style="margin-right:5px;" data-toggle="modal" data-target="#modal_{{ $event['id'] }}">
                    Edit 
                </button>
				<a type="button" class="btn btn-primary" data-toggle="modal" href="deleteEvent/{{ $event['id'] }}">
                    delete 
                </a>


                <!-- Modal -->
                <div class="modal fade" id="modal_{{ $event['id'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">{{  $event['title']  }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class=" card card-info">
                                    <div class="card-header">
                                        <h3 class="card-title text-center">Edit Fairs</h3>
                                    </div>
                                    <form class="form-horizontal" action="/editevent" method="POST" id="form1">
                                        <div class="card-body">

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="event_title">Event Title</label>
                                                    <input type="text" class="form-control" id="firstname" value="{{ !empty($event['title']) ? $event['title'] : '' }}" name="event_title" placeholder="Bake Show" required>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label for="details">Details</label>
                                                <textarea class="form-control" form="form1" id="company" value="{{ !empty($event['desc']) ? $event['desc'] : '' }}" name="details" placeholder="Enter details" required>{{ !empty($event['desc']) ? $event['desc'] : '' }}</textarea>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="city">City</label>
                                                    <input type="text" class="form-control" value="{{ !empty($event['city']) ? $event['city'] : '' }}" name="city" id="city" required>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="state">State</label>
                                                    <select id="state"  value="{{ !empty($event['state']) ? $event['state'] : '' }}" class="form-control" name="state">
                                                        <option value="Delhi" selected>Delhi</option>
                                                        <option value="Gujarat">Gujarat</option>
                                                        <option value="Punjab">Punjab</option>
                                                        <option value="Maharashtra">Maharashtra</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <input type="hidden" value="{{ !empty($event['id']) ? $event['id'] : '' }}" name="id" id="id" required>
                                            <div class="form-group">
                                                <label for="date">Date:</label>
                                                <input type="datetime-local" value="{{ !empty($event['event_date']) ? $event['event_date'] : '' }}" id="date" name="date" required>
                                            </div>


                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" name="Submit" class="btn btn-info">Edit Event</button>
                                            <br>
                                        </div>
                                    </form>
									
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="collapseOne{{$event['id']}}" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">

                    <div class="card">
                        <div class="card-header border-transparent">
                            <h3 class="card-title">Participants</h3>


                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table m-0">
                                    <thead>
                                        <tr>
                                            <th>Participant ID</th>
                                            <th>Firstname</th>
                                            <th>Company</th>
                                            <th>Email</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         @if(count($event['participates']) > 0 )   
                                        @foreach($event['participates'] as $participates)
                                        <tr>
                                          
                                            <td>{{ $participates['srno'] }}</td>
                                            <td>{{ $participates['firstname'] }}</td>
                                            <td>{{ $participates['lastname'] }}</td>
                                            <td>
                                                {{ $participates['email'] }}
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
     
        @endforeach
    </div>
</div>
@endsection
@section('script')
<style>
    div.card {
        margin-bottom: 4%;

    }
</style>
@endsection
