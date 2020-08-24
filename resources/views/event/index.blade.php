@extends('event.layout')
 
@section('content')
    <dir>    <h2>Events Listing</h2></dir>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <a class="btn btn-success" href="{{ route('event.create') }}"> Create New event</a>
            </div>
            <div class="pull-right">
              <a class="btn btn-warning" href="{{ route('notify.index') }}">Notification Master</a>
           </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
        <th>No</th>
        <th>Event Name</th>
        <th>Event Date</th>
        <th>Event Start</th>
        <th>Event End</th>
        <th>Event Details</th>
        <th width="280px">Action</th>
        </tr>
        @foreach ($event as $events)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $events->name }}</td>
             <td>{{ $events->date }}</td>
            <td>{{ $events->start }}</td>
            <td>{{ $events->end }}</td>
            <td>{{ $events->detail }}</td>
            <td>
                 <a class="btn btn-info" href="{{ route('event.show',$events->id) }}">Show</a>
                 <a class="btn btn-primary" href="{{ route('event.edit',$events->id) }}">Edit</a>

`               
                <form  action="{{ route('event.destroy',$events->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>

                   <form role="form" method="post" action="{{action('EventController@notify')}}">
                <input type="hidden" name="id" value="{{ $events->id}}">
                @csrf
                <button type="submit" class="btn btn-primary">Send Communication</button>
                </form>

                <form role="form" method="post" action="{{action('EventController@delete')}}">
                <input type="hidden" name="id" value="{{ $events->id}}">
                @csrf
                <button type="submit" class="btn btn-danger">Delete Communication</button>
                </form>

                 
                 
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $event->links() !!}
      
@endsection