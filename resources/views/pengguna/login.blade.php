@extends('layout')

@section('content')
<h3 align="left">Login Pengguna</h3><br />

@if(isset(Auth::user()->email))
<script>window.location="/login/successlogin";</script>
@endif

@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>{{ $message }}</strong>
</div>
@endif

@if (count($errors) > 0)
<div class="alert alert-danger">
  <ul>
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

<form method="post" action="{{ url('/login/checklogin') }}">
  {{ csrf_field() }}
  <div class="form-group">
    <label>ID User</label>
    <input type="text" name="login" class="form-control" />
  </div>
  <div class="form-group">
    <label>Password</label>
    <input type="text" name="pswd" class="form-control" />
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-primary">Masuk</button>
    <a class="btn btn-default" href="/pengguna"> Batal</a>
  </div>
</form>
@endsection