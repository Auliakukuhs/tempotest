<?php

namespace App\Http\Controllers;

use App\Pengguna;
use Illuminate\Http\Request;
use Hash;
use Crypt;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Pengguna::latest()->paginate(5);
  
        return view('pengguna.index',compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengguna.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'login' => 'required',
            'pswd' => 'required',
            'email' => 'required|unique:pengguna',
            'deskripsi' => 'required',
        ]);
  
        $data = $request->all();
        $data['pswd'] = Crypt::encryptString($request->pswd);
        Pengguna::create($data);

   
        return redirect()->route('pengguna.index')
                        ->with('success','Pengguna berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function edit($users)
    {
        $editUser = Pengguna::find($users);
        // dd($editUser->pswd);
        $pswd = Crypt::decryptString($editUser->pswd);

        return view('pengguna.edit',compact('editUser', 'pswd'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $users)
    {
        $request->validate([
            'login' => 'required',
            'pswd' => 'required',
            'email' => 'required',
            'deskripsi' => 'required',
        ]);

        $member = Pengguna::find($users);

        $data = $request->all();
        $data['pswd'] = Crypt::encryptString($request->pswd);
        $member->update($data);
  
        return redirect()->route('pengguna.index')
                        ->with('success','Pengguna berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = Pengguna::find($id);
        $member = Pengguna::destroy($id);
  
        return redirect()->route('pengguna.index')
                        ->with('success','Product deleted successfully');
    }
}
