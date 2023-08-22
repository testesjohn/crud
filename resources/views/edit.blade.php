@extends('layout.layout')
@section('title', 'Edit')
@section('content')
    <form action="{{route('user.update', $usuario->id)}}" method="post">
        @method('put')
        @csrf

        <div>
            <label>Name:</label>
            <input type="text" name="name" value="{{$usuario->name}}">
        </div>
        <div>
            <label>E-mail:</label>
            <input type="email" name="email" value="{{$usuario->email}}">
        </div>
        <div>
            <label>Password:</label>
            <input type="password" name="password">
        </div>

        <button type="submit">Edit</button>
    </form>
@endsection
