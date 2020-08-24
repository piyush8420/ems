@extends('notify.layout')
   
@section('content')
    <div>
         <div class="">
                <h2>Select Notification</h2>
            </div>
    </div>
    <div class="row">
        <div class="col-lg-12 margin-tb">
           
            <div class="pull-left">
               
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('event.log_delete') }}" method="POST">
        @csrf
     
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <p>are you sure want to delete log for "<span>{{ $event_name }}</span>" event. </p>
            </div>
            <div>
            	<input type="hidden" name="event_id" value="{{ $event_id }}">
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 ">
              <button type="submit" class="btn btn-primary">Yes</button>
               <a class="btn btn-primary" href="{{ route('event.index') }}"> Back</a>
            </div>
        </div>
   
    </form>
@endsection