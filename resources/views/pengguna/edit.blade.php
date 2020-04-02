@extends('layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Pengguna</h2>
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
  
    <form action="{{ route('pengguna.update', $editUser->login) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>ID Users:</strong>
                    <input type="text" name="login" value="{{ $editUser->login }}" class="form-control" onkeyup="nospaces(this)">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Password:</strong>
                    <input type="pswd" name="pswd" value="{{ $pswd }}" class="form-control" placeholder="dengan mengedit artinya anda mengubah password ulang kembali">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="text" name="email" value="{{ $editUser->email }}" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Deskripsi:</strong>
                    <input type="text" name="deskripsi" value="{{ $editUser->deskripsi }}" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
              <button type="submit" class="btn btn-primary">Edit</button>
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
            Apakah proses edit pengguna ingin dibatalkan?
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