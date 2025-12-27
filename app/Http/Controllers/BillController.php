<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BillController extends Controller
{
    //
    public function detailBill(){
        return view('bill-detail');
    }
}
