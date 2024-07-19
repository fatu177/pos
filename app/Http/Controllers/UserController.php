<?php

namespace App\Http\Controllers;

use App\Models\level;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function index()
    {
        $title = 'User';
        $data = User::where('nama_lengkap','!=','Admin')->get();
        return view('user.index', compact('title', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'User';
        $level = level::get();
        return view('user.create', compact('title','level'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|max:255',
            'id_level' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        User::create($request->all());
        return redirect()->route('user.index');
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
        $title = 'User';
        $data = User::findOrFail($id);
        $level = level::get();
        return view('user.edit', compact('title', 'data','level'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_lengkap' => 'required|max:255',
            'id_level' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);
        if (trim($request->password) == "") {
            $password = Hash::make(User::find($id)->password);
        } else {
            $password = $request->password;
        }


        User::find($id)->update([
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'id_level' => $request->id_level,
            'password' => $password,
        ]);
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
        // Logika untuk menyimpan data
        User::find($id)->delete();
        return redirect()->route('user.index');

    } catch (\Exception $e) {
        return Redirect::back()->withInput()->withErrors('Gagal menyimpan data.');
    }
    }
}