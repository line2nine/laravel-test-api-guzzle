@extends('user.master')
@section('content')
    <form method="post" action="{{route('user.update', $user->id)}}">
        @csrf
        <div class="form-group">
            <label for="exampleInputName">Name</label>
            <input name="name" value="{{$user->name}}" type="text" class="form-control" id="exampleInputName" aria-describedby="nameHelp">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{route('user.list')}}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
