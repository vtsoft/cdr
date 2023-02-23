<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Cdr;

class CdrController extends Controller
{

    public function dashboard(Request $request) {
        $cdr = Cdr::query();
        $dst = $request->input('dst');

        if ($request->filled('date_from')) {
            $cdr = $cdr->whereDate('calldate', '>=', $request->input('date_from'));
        }

        if ($request->filled('date_to')) {
            $cdr = $cdr->whereDate('calldate', '<=', $request->input('date_to'));
        }

        if ($request->filled('src')) {
            $cdr = $cdr->where('src', $request->input('src'));
        }            

        if ($request->filled('dst')) {
            if($request->input('like') == 1) {
                $cdr = $cdr->where('dst', 'like', '%'.$dst.'%');
            } else {
                $cdr = $cdr->where('dst', '=', $dst);
            }
        }

        $table_max_rows = config('services.dashboard.table_max_rows');
        $cdr = $cdr->paginate($table_max_rows)->withQueryString();      

        return Inertia::render('Dashboard', ['data' => $cdr]);
    }
    
}
