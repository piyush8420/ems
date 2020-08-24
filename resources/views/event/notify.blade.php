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
                <a class="btn btn-primary" href="{{ route('event.index') }}"> Back</a>
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
  
    <form action="{{ route('event.store_notify_mode') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                	<div>Select Notification Mode</div>
                    <select name="mode" >
                     @foreach($notify as $not)
                      <option value="{{ $not->id }}">{{ $not->name }}</option>
                    @endforeach
                     </select>
                </div>
            </div>
            <div>
            	<input type="hidden" name="event_id" value="{{ $event_id }}">
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 ">
              <button type="submit" class="btn btn-primary">Send Notification</button>
            </div>
        </div>
   
    </form>
@endsection