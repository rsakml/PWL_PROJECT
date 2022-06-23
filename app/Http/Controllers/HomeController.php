<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Pesanan;
use App\Models\PesananDetails;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\User;
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
        $user = Auth::user();
        $count = Product::all()->count();
        $count2 = Pesanan::all()->count();
        $count3 = User::all()->count();
        $count4 = PesananDetails::all()->count();
        $count5 = Employee::all()->count();
        $count6 = Supplier::all()->count();
        return view('admin.main', compact('user','count','count2','count3','count4','count5','count6'));
    }
}
