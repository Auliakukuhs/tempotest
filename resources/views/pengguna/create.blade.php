@extends('layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Tambah Pengguna</h2>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('pengguna.store') }}" method="POST">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>ID User:</strong>
                <input type="text" name="login" class="form-control" placeholder="Masukkan ID User" onkeyup="nospaces(this)">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Password:</strong>
                <input type="password" name="pswd" class="form-control" placeholder="Masukkan Password User">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="text" name="email" class="form-control" placeholder="Masukkan Email">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Deskripsi:</strong>
                <input type="text" name="deskripsi" class="form-control" placeholder="Masukkan Deskripsi">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <button type="submit" class="btn btn-primary">Tambah</button>
            <a class="btn btn-default" href="#" data-toggle="modal" data-target="#modal"> Kembali</a>
        </div>
    </div>
</form>

<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Peringatan!</h5>
      </div>
      <div class="modal-body">
        Apakah proses tambah pengguna ingin dibatalkan?
      </div>
      <div class="modal-footer">
        <a class="btn btn-danger" href="{{ route('pengguna.index') }}">Ya</a>
        <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
      </div>
    </div>
  </div>
</div>

<script>
    function nospaces(t){
        if(t.value.match(/\s/g)){
            t.value=t.value.replace(/\s/g,'');
        }
    }
</script>
@endsection