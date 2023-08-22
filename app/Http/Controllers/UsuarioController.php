<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = Usuario::all();

        return view('index', ['usuarios' => $usuarios]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return vieW('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:usuarios,email',
            'password' => 'required|string'
        ]);

        $user = Usuario::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        if($user){
            return redirect()->route('user.index')->with('msg', 'User created successfully');
        }

        return redirect()-> back()->with('msg', 'User creation failed');
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $user)
    {
        return view('edit', ['usuario' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario $user)
    {
        $data = $request->validate([
            'name' => 'string',
            'email' => 'email',
            'password' => ''
        ]);

        if($data['password']){
            $user = $user -> update([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
            ]);

            if($user) {
                return redirect() -> route('user.index')->with('msg', 'User updated successfully');
            }

            return redirect() -> back()->with('msg', 'User update failed');

        }

        $user = $user -> update([
            'name' => $data['name'],
            'email' => $data['email']
        ]);

        if($user) {
            return redirect() -> route('user.index')->with('msg', 'User updated successfully');
        }

        return redirect() -> back()->with('msg', 'User update failed');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $user)
    {
        if($user->delete()){
            return response()->json([
                'success' => true,
                'message' => 'User deleted succesfully',
                'route_link' => route('user.index')
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'User delete failed',
        ]);
    }
}
