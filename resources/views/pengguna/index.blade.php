@extends('layout')
 
@section('content')
    <div class="row">
        <div class="col-md">
            <div class="pull-left">
                <h2>List Pengguna</h2>
            </div>
        </div>
        <div class="col-md text-right mt-5 mb-3">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('pengguna.create') }}">Tambah</a>
                <a class="btn btn-info" href="/login">Login</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-striped table-responsive">
        <tr>
            <th>ID Users</th>
            <th>Password</th>
            <th>Email</th>
            <th>Deskripsi</th>
            <th width="280px">Aksi</th>
        </tr>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->login }}</td>
            <td>{{ \Illuminate\Support\Str::limit($user->pswd, 50, $end='...')  }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->deskripsi }}</td>
            <td>
                <form action="{{ route('pengguna.destroy',$user->login) }}" method="POST">
    
                    <a class="btn btn-link" href="{{ route('pengguna.edit',$user->login) }}">Edit</a>
                    <a role="button" href="#" class="btn btn-link" data-toggle="modal" data-target="#modal">Hapus</a>
   

                    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Peringatan!</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Apakah anda ingin menghapus pengguna ini?
                            </div>
                            <div class="modal-footer">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#modal">Ya</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                            </div>
                            </div>
                        </div>
                    </div>
                    
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {!! $users->links() !!}
  
@endsection