@extends('layouts.main')

@section('title')
    Create
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
            </div><br/>
        @endif
        <div class="row">
            <div class="col-md-8 offset-1">
                <form method="post" action="{{action('TicketsController@store')}}">
                    @csrf
                    <div class="form-group">
                        <label for="title">title</label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
                    <div class="form-group">
                        <label for="description">description</label>
                        <input type="text" class="form-control" id="description" name="description">
                    </div>
                    <button type="submit" class="btn btn-primary">create</button>
                </form>

            </div>
        </div>
    </div>


@endsection
