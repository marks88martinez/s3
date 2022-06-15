<?php

namespace App\Http\Controllers;

use App\Mail\ActiveUser;
use App\Models\Empresa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;



class EmpresaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Empresa::withTrashed()->find(1)->restore();
        $emps = Empresa::orderBy('id', 'desc')->paginate(10);
        return view('Empresa.index')->with(compact('emps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Empresa.create');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $import = $request->importExcel;

            Empresa::create([
                'sku' => $request['sku'],
                'name' => $request['name'],
            ]);


         return redirect('empresa') ->with(['message' => 'Empresa Creado', 'alert' => 'alert-success']);;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $enum = [
            "Active" => "Active",
            "Inactive"  => "Inactive"
        ];
        $prod = Empresa::find($id);
        return view('empresa.edit',compact('prod', 'enum'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        //dd( $request);
        $empresa = Empresa::find($id);
        $user = User::where('empresa_id','=',$empresa->id)->first();



        $empresa->fill(['nombre_empresa' => $request->nombre_empresa,'status' => $request->status]);
        $user->fill(['status' => $request->status]);

        $empresa->save();
        $user->save();

        $this->sendEmail($empresa->email);



        return redirect('empresa')->with(['message' => 'Empresa Actualizado', 'alert' => 'alert-success']);
    }

    public function sendEmail($email){

        $detail=[
            'title'=>'Correo de Activacion de Usuario',
            'body'=>"Correo de Activacion Body email: $email",
        ];

        // Mail::to($email)->send(new ActiveUser($detail));
        Mail::to("marks88martinez@gmail.com")->queue(new ActiveUser($detail));

       // return 'Correo enviado';

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Empresa::find($id);

        $user->delete();
        return redirect('empresa')->with(['message' => 'Empresa Eliminado', 'alert' => 'alert-danger']);;
    }
}
