<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Cdr;

class CdrController extends Controller
{

    public function dashboard() {
        $data = Cdr::all();
        return Inertia::render('Dashboard', ['data' => $data]);
    }

    public function search(Request $request) {
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
            if($request->input('likeyes') != null) {
                $cdr = $cdr->where('dst', 'like', '%'.$dst.'%');
            } else if($request->input('likeno') != null) {
                $cdr = $cdr->where('dst', '=', $dst);
            }
        }
        
        \Log::info(json_encode($cdr));

        $cdr = $cdr->get();

        return Inertia::render('Dashboard', ['data' => $cdr]);
    }
    
}
