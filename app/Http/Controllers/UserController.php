<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function adminIndex()
    {
        return view('admin.users.index');
    }

    public function show($id)
    {
        $user = User::find($id);
        $grav_url = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( auth()->user()->email ) ) ) . "&s=300&time=".time();

        return view('admin.users.show', compact('user'), ['grav_url' => $grav_url]);
    }

    public function filter(Request $request)
    {
        $request->validate([
            'page' => 'nullable|integer',
            'filtro' => 'nullable|string|max:255',
        ]);

        $page = $request->page ?? 1;
        $perPage = 10;
        $offset = ($page - 1) * $perPage;

        $usuarios = User::where('name', 'like', "%{$request->filtro}%")
            ->orWhere('email', 'like', "%{$request->filtro}%");
        $total = $usuarios->count();
        $usuarios = $usuarios->offset($offset)->limit($perPage)->select('name', 'email', 'role', 'id as url')
            ->orderBy('name', 'asc')
            ->get();

        $usuarios->map(function($usuario){
            $usuario->url = route('admin.users.show', $usuario->url, false);
            $usuario->role = $usuario->role == 1 ? 'Administrador' : 'Usuário';
        });

        $page = intval($page) > ceil($total / $perPage) ? ceil($total / $perPage) : $page;
        return response([
            'data' => $usuarios,
            'total' => $total,
            'page' => $page,
            'per_page' => $perPage,
        ], 200, [
            'Content-Type' => 'application/json',
        ], JSON_PRETTY_PRINT);
    }
}
