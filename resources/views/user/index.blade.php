@extends('layout')

@section('content')
    <a href="/user/create"> Add user </a>
    <table>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a href="/user/{{ $user->id }}">Edit</a>

                    <a href="/user/{{ $user->id }}/delete">Delete</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
