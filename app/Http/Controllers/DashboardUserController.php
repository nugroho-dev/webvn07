<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Http\Request;

class DashboardUserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(10);
        return view('dashboard.users.index', compact('users'));
    }
    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => [
                'required',
                'confirmed',
                Password::min(8)->mixedCase()->numbers()->symbols()
            ],
        ]);

        User::create([
            'name' => $validated['name'],
            'username' => $validated['username'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect('/home/pengaturan/users')->with('success', 'User berhasil ditambahkan.');
    }
    public function edit($id)
    {
    $user = User::findOrFail($id);
    return response()->json($user); // kirim data dalam bentuk JSON
    }
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $rules = [ 
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => [
                'nullable',
                'confirmed',
                Password::min(8)->mixedCase()->numbers()->symbols()
            ],
        ];
        if ($request->email !== $user->email) {
            $rules['email'] = '|unique:users';
        }
        if ($request->username !== $user->username) {
            $rules['username'] = '|unique:users';
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }
        $user->save();
    return redirect()->back()->with('success', 'Data berhasil diupdate.');
    }
    public function destroy($id)
    {
      
        User::destroy('id', $id);
    
    return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }
}
