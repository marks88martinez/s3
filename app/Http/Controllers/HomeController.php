<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Rma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $prods = Rma::with('user')->paginate(10);
        // $prods = Producto::orderBy('id', 'desc')->paginate(10);
        return view('home')->with(compact('prods'));
    }
}
