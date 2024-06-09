<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class SukaController extends Controller
{
    public function index()
    {
        $data = DB::table('suka')
                    ->join('tempat_wisata', 'suka.tempat_wisata_id', '=', 'tempat_wisata.id')
                    ->select(DB::raw('COUNT(suka.id) AS like_count'), 'tempat_wisata.name_tw')
                    ->groupBy('tempat_wisata.id')
                    ->orderBy('like_count', 'desc')
                    ->get();

        return view('admin.suka.index', compact('data'));
    }
}
