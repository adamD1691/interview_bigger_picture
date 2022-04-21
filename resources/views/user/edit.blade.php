@extends('layout')

@section('content')
    <a href="/"> Users index </a>
    @include('form_errors')

    <form method="post" action="/user/{{ $user->id }}/update">
        {{ csrf_field() }}
        <label for="fname">Name:</label><br>
        <input type="text" id="fname" name="name" value="{{ $user->name }}"><br>
        <label for="lname">Email:</label><br>
        <input type="text" id="lname" name="email" value="{{ $user->email }}"><br><br>

        <button type="submit">Update</button>
    </form>
@endsection
