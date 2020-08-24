@extends('notify.layout')
 
@section('content')
    <dir>    <h2>Notification Listing</h2></dir>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <a class="btn btn-success" href="{{ route('notify.create') }}"> Create New notify</a>
            </div>
            <div class="pull-right">
              <a class="btn btn-primary" href="{{ route('event.index') }}">Back</a>
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
        <th>notify Name</th>
        <th width="280px">Action</th>
        </tr>
        @foreach ($notify as $notifys)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $notifys->name }}</td>

            <td>
                 <a class="btn btn-info" href="{{ route('notify.show',$notifys->id) }}">Show</a>
                 <a class="btn btn-primary" href="{{ route('notify.edit',$notifys->id) }}">Edit</a>
                <form  action="{{ route('notify.destroy',$notifys->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>

                 
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $notify->links() !!}
      
@endsection