@extends('layout.layout')
@section('title', 'Create')
@section('content')
    <form action="{{route('user.store')}}" method="post">
        @csrf

        <div>
            <label>Name:</label>
            <input type="text" name="name">
        </div>
        <div>
            <label>E-mail:</label>
            <input type="email" name="email">
        </div>
        <div>
            <label>Password:</label>
            <input type="password" name="password">
        </div>

        <button type="submit">Create</button>
    </form>
@endsection
