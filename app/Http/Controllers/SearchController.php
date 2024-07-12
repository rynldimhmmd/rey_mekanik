<?php

namespace App\Http\Controllers;

use App\Models\Mekanik;
use App\Models\Servis;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
{
    $query = $request->input('query');

    // Lakukan pencarian di model yang sesuai, contoh disini hanya Servis dan Mekanik
    $mekaniks = Mekanik::where('nama', 'LIKE', "%$query%")
                        ->orWhere('alamat', 'LIKE', "%$query%")
                        ->orWhere('notelp', 'LIKE', "%$query%")
                        ->orderBy('created_at', 'desc')
                        ->paginate(10);

    $servis = Servis::where('jenis_servis', 'LIKE', "%$query%")
                    ->orderBy('tanggal_servis', 'desc')
                    ->paginate(10);

    return view('search.index', compact('mekaniks', 'servis'));
}

}
