@extends('layouts.main')

@section('title')
    Index
@endsection

@section('content')
    <div class="container">
        @if(\Session::has('success'))
            <div class="alert alert-success">
                {{\Session::get('success')}}
            </div>
        @endif
        <div class="row">
            <div class="col-md-8 offset-2">
                <a href="{{url('/tickets/create')}}" class="btn btn-success float-right mb-1">Create Ticket</a>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">title</th>
                        <th scope="col">description</th>
                        <th> Edit</th>
                        <th> Delete</th>


                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tickets as $ticket)
                        <tr>
                            <td>{{$ticket->id}}</td>
                            <td>{{$ticket->title}}</td>
                            <td>{{$ticket->description}}</td>
                            <td><a href="{{action('TicketsController@edit',$ticket->id)}}"
                                   class="btn btn-warning">Edit</a></td>
                            <td>
                                <form action="{{action('TicketsController@destroy', $ticket->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" onclick="return confirmDelete();" type="submit">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @if(empty($tickets))
                        <tr>
                            <td colspan="4" class="text-center">Sorry, You are out of stock</td>
                        </tr>
                    @endif


                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        function confirmDelete() {
            if(!confirm("Are You Sure to delete this"))
                event.preventDefault();
        }
    </script>

@endsection
