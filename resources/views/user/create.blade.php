@extends('layout')

@section('content')
    <a href="/"> Users index </a>
    @include('form_errors')

    <form method="post" action="/user/create">
        {{ csrf_field() }}
        <label for="fname">Name:</label><br>
        <input type="text" id="fname" name="name" ><br>
        <label for="lname">Email:</label><br>
        <input type="text" id="lname" name="email" ><br>
        <label for="lname">Password:</label><br>
        <input type="password" id="lname" name="password" ><br>
        <label for="lname">Password confirmation:</label><br>
        <input type="password" id="lname" name="password_confirmation" ><br><br>

        <button type="submit">Save</button>
    </form>
@endsection
