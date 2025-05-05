<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePenggunaRequest;
use App\Http\Requests\UpdatePenggunaRequest;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $penggunas = Pengguna::latest()->paginate(2);
        return view("penggunas.index", compact("penggunas"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("penggunas.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePenggunaRequest $request)
    {
        //cara 1
        // $request->validate([
        //     "name"=> "required|string|max:100",
        //     "email"=> "required|email|unique:penggunas",
        //     "password"=> "required|min:6|confirmed",
        //     "phone"=> "nullable|digits_between:10,13",
        // ]);
        // Pengguna::create([
        //     'name'=> $request->name,
        //     'email'=> $request->email,
        //     'password'=> Hash::make($request->password),
        //     'phone'=> $request->phone,
        // ]);

        // $data = $request->validated();
        // $data['password']= Hash::make($data['password']);
        // Pengguna::create($data);

        return redirect()->route('penggunas.create')->with('success','Pengguna berhasil ditambahkan!');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $pengguna = Pengguna::findOrFail( $id );
        return view('penggunas.edit', compact('pengguna'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePenggunaRequest $request, string $id)
    {
        //cara 1
        // $request->validate([
        //     "name"=> "required|string|max:100",
        //     "phone"=> "nullable|digits_between:10,13",
        // ]);

        $pengguna = Pengguna::findOrFail( $id );
        $data = $request->validated();
        // $pengguna->update([
        //     'name'=> $request->name,
        //     'phone'=> $request->phone,
        // ]);

        $pengguna->update($data);
        return redirect()->route('penggunas.index')->with('success','Data Berhasil diupdate');
    }
  

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
