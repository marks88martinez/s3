<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterUserController extends Controller
{
    public function create(){
        return view('auth.register');
    }

    public function store(Request $data)
    {
        $registro = $data['registro'];
        // dd($registro);
        if ($registro == 'empresa') {

            $emp = Empresa::create([
                'nombre_empresa' => $data['nombre_empresa'],
                'sitio_web' => $data['sitio_web'],
                'telefono' => $data['telefono'],
                'email' => $data['email'],
                'tipo_documento' => $data['tipo_documento'],
                'num_documento' => $data['num_documento'],
             ]);




            User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'empresa_id' => $emp->id,

                // 'tipo_user' => 0,
             ]);

             return redirect('/') ->with(['message' => 'Producto Creado', 'alert' => 'alert-success']);;


        }else{

            User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'status' => 'Active',
                // 'tipo_user' => 1,
             ]);

             return redirect('/') ->with(['message' => 'Producto Creado', 'alert' => 'alert-success']);;



        }

    }
}
