<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\BillImageModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BillController extends Controller
{
    //
    public function detailBill(){
        $images = BillImageModel::orderBy('created_at', 'desc')->get();

        $groupedImages = $images->groupBy(function ($image) {
            if ($image->created_at->isToday()) {
                return 'today';
            }

            if ($image->created_at->isYesterday()) {
                return 'yesterday';
            }

            if ($image->created_at->greaterThanOrEqualTo(Carbon::now()->subWeek())) {
                return 'last_week';
            }

            return 'older';
        });
        return view('bill-detail', compact('groupedImages'));
    }
}
