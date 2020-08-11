@extends('user.master')
@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $key => $user)
            <tr>
                <td>{{++$key}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td><a href="{{route('user.edit', $user->id)}}">Edit</a> | <a href="{{route('user.delete', $user->id)}}">Delete</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
