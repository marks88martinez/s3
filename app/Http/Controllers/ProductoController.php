<?php

namespace App\Http\Controllers;

use App\Imports\ProductosImport;
use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $search =  $request->input('search');
        // dd($search);

        if ( $request->search) {
            // dd($search);

            $prods = Producto::where('name','like','%'.$search.'%')
            ->orWhere('sku','like','%'.$search.'%')
            ->orderBy('id','desc')->paginate(10);
        }else{
               // $categorias = Categoria::whereNull('categorias_id')->get();
            $prods = Producto::orderBy('id','desc')->paginate(10);
        }
        //$prods = Producto::orderBy('id', 'desc')->paginate(10);
        return view('Product.index')->with(compact('prods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Product.create');


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
        if ($import) {
            # code...
            Excel::import(new ProductosImport, $import);
        }else{
            $imagenes = $request->file('photourl')->store('public/producto');
            $url = Storage::url($imagenes);

            if ($request->photourl) {
                Producto::create([
                    'sku' => $request['sku'],
                    'name' => $request['name'],
                    'photourl' =>  $url
                ]);

            }else{
                Producto::create([
                    'sku' => $request['sku'],
                    'name' => $request['name']
                ]);

            }

        }



         return redirect('product') ->with(['message' => 'Producto Creado', 'alert' => 'alert-success']);;

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
        $prod = Producto::find($id);
        return view('product.edit',compact('prod'));
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
        // dd($request);
        $imagenes = $request->file('photourl')->store('public/producto');
        $url = Storage::url($imagenes);

        $dir = Producto::find($id);
        $dir->fill(
            [
                'sku' => $request['sku'],
                'name' => $request['name'],

                'photourl' =>  $url
            ]
        );

        $dir->save();
        return redirect('product')->with(['message' => 'Producto Actualizado', 'alert' => 'alert-success']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
