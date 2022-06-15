<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request )
    {
        // Faq::withTrashed()->find(2)->restore();
        $search =  $request->input('search');
        // dd($search);

        if ( $request->search) {
            // dd($search);

            $faqs = Faq::where('name','like','%'.$search.'%')
            ->orderBy('id','desc')->paginate(10);
        }else{

            $faqs = Faq::orderBy('id','desc')->paginate(10);
        }
        return view('faq.index')->with(compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Faq.create');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            Faq::create([
                'name' => $request['name'],
                'description' => $request['description'],
            ]);





         return redirect('faq') ->with(['message' => 'Faq Creado', 'alert' => 'alert-success']);;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $faq = Faq::find($id);
        return view('faq.show',compact('faq'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $faq = Faq::find($id);
        return view('faq.edit',compact('faq'));
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

        $empresa = Faq::find($id);
        $empresa->fill(['name' => $request->name,'description' => $request->description]);
        $empresa->save();

        return redirect('faq')->with(['message' => 'Faq Actualizado', 'alert' => 'alert-success']);;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Faq::find($id);

        $user->delete();
        return redirect('faq')->with(['message' => 'Faq Eliminado', 'alert' => 'alert-danger']);
    }
}
