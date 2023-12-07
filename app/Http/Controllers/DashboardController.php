<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteRequest;
use App\Http\Requests\SwapRequest;
use App\Models\Company;
use App\Models\Employee;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    
    public function index(Request $request)
    {
        return view('index',[
            'products' => Product::get(),
        ]);
    }
}
