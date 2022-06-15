<?php

namespace App\Http\Controllers;

use App\Models\Direccione;
use App\Models\Empresa;
use App\Models\Image;
use App\Models\Producto;
use App\Models\Rma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;

use Illuminate\Support\Facades\Storage;

class RmaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Admin');
    }
    public function index(Request $request)
    {

        $id =  $request->input('id');

        $estados = ['no_verificado','verificado'];

        if ( $request->id) {
            // dd($search);

            // $dir = Direccione::find($id);
            // $dirs = Direccione::where('empresa_id', Auth::user()->c)->get();


            $emp = Empresa::where('status','=','Active')->get();
            $prod = Producto::all();

            $rma = Rma::find($id);

            $rmas = Rma::whereHas('user', function ($query) {
                return $query->where('empresa_id', '=', Auth::user()->empresa_id);
            })->orderBy('id', 'desc')->paginate(10);





        }else{
            $rma= null;

            $emp = Empresa::where('status','=','Active')->get();
            $prod = Producto::all();

            $rmas = Rma::whereHas('user', function ($query) {
                return $query->where('empresa_id', '=', Auth::user()->empresa_id);
            })->orderBy('id', 'desc')->paginate(10);
        }



        // dd($request);


        // dd($rmas);


        return view('Rma.index')->with(compact('rma','rmas','prod', 'emp', 'estados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function rmaPDF($id)
    {
       $rma =  Rma::find($id);
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('pdf.rmapdf', ['rma'=>$rma]);
        return $pdf->stream();
        // return view('pdf.rmapdf');
    }
    public function create()
    {
        return view('Rma.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'photo_problema'=>'required|image|max:2048',
        //     'photo_nota_compra'=>'required|image|max:2048',
        // ]);

        // dd($request);

        $rma =  Rma::create([
            'sku'=> 1,
            'serial'=>$request->serial,
            'num_lote'=>$request->num_lote,
            'fecha'=>$request->fecha_de_compra,
            'empresa_id'=>$request->empresa_id,
            'producto_id'=>$request->producto_id,
            'direccion_id'=>$request->direccion_id,
            'descripcion'=>$request->descripcion,
            'user_id'=>Auth::user()->id,

        ]);
        // $rma->save();
        // dd($rma->id);

        //php artisan storage:link
        if ($request->photoproblema) {

                $imagenes = $request->file('photoproblema')->store('public/photoProblema');
                $url = Storage::url($imagenes);
                Image::create([
                                'tipo'=> 'photo_problema',
                                'url'=> $url,
                                'rma_id'=> $rma->id,
                            ]);
        }
        if ($request->photonotacompra) {

                $imagenes = $request->file('photonotacompra')->store('public/photoNotaCompra');
                $url = Storage::url($imagenes);
                Image::create([
                                'tipo'=> 'photo_nota_compra',
                                'url'=> $url,
                                'rma_id'=> $rma->id,
                            ]);
        }



        return redirect('rma') ->with(['message' => 'Usuario Creado', 'alert' => 'alert-success']);


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
    public function selectDir($id)
    {
       $dir=  Direccione::where('empresa_id','=',$id)->get();
        return $dir;
    }
    public function selectPhoto($id)
    {
       $dir=  Image::where('rma_id','=',$id)
       ->where('tipo','photo_problema')
       ->firstOrFail();
        return $dir;
    }
    public function photoNotaCompra($id)
    {
       $dir=  Image::where('rma_id','=',$id)
       ->where('tipo','photo_nota_compra')
       ->firstOrFail();
        return $dir;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Rma::find($id);
        $user->delete();
        return redirect('rma')->with(['message' => 'RMA Eliminado', 'alert' => 'alert-danger']);;
    }
}
