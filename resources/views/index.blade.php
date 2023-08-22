@extends('layout.layout')
@section('title', 'Home')
@section('content')
    <h1>Home</h1>

    @if ($usuarios -> count() > 0)
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$usuario->name}}</td>
                <td>{{$usuario->email}}</td>
                <td>
                    <a href="{{route('user.edit', $usuario->id)}}">Edit</a>

                    <form action="{{route('user.destroy', $usuario->id)}}" name="destroy">
                        @csrf

                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <h3>No users, <a href="{{route('user.create')}}">create now</a></h3>
    @endif
@endsection
