@extends('layouts.main')

@section('title')
    Edit
@endsection

@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
        @endif
        <div class="row">
            <div class="col-md-9 offset-2">
                <form method="post" action="{{action('TicketsController@update', $ticket->id)}}">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="title">title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{old('title', $ticket->title)}}">
                    </div>
                    <div class="form-group">
                        <label for="description">description</label>
                        <input type="text" class="form-control" id="description" name="description" value="{{old('description', $ticket->description)}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>


@endsection
