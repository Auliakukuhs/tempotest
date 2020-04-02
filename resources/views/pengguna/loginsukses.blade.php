@extends('layout')

@section('content')
<div class="container box">
   <h3 align="center">Login</h3><br />
    <div class="alert alert-danger success-block">
        <strong>Selamat Datang {{Session::get('id_user')}}</strong>
        <br />
        <a href="{{ url('/logout') }}">Logout</a>
    </div>
   <br/>
</div>
@endsection