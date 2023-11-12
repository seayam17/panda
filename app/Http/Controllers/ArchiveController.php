<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Session;
use Auth;
use Illuminate\Support\Facades\DB;

class ArchiveController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $months = DB::table('incomes')
          ->select(DB::raw('YEAR(income_date) year'),DB::raw('MONTH(income_date) month'))
          ->union(DB::table('expenses')
          ->select(DB::raw('YEAR(expense_date) year'),DB::raw('MONTH(expense_date) month')))
          ->distinct()
          ->get();
        return view('admin.archive.index',compact('months'));
    }

    public function month($month){
         return view('admin.archive.month',compact('month'));
    }
}
