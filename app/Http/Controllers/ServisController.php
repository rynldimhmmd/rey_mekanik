<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servis;
use App\Models\mekanik;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ServisController extends Controller
{
    public function index(): View
    {
        $servis = Servis::latest()->paginate(10);
        return view('servis.index', compact('servis'));
    }

    public function create(): View
    {
        $mekanik = mekanik::all();
        return view('servis.create', compact('mekanik'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'id_servis'     => 'required',
            'id_mekanik'    => 'required',
            'jenis_servis'  => 'required',
            'tanggal_servis'=> 'required|date',
        ]);

        Servis::create($validated);

        return redirect()->route('servis.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show(string $id_servis): View
    {
        $servis = Servis::findOrFail($id_servis);
        return view('servis.show', compact('servis'));
    }

    public function edit(string $id_servis): View
    {
        $servis = Servis::find($id_servis);
        $mekanik = Mekanik::all();
        return view('servis.edit', compact('servis', 'mekanik'));
    }

    public function update(Request $request, string $id_servis): RedirectResponse
    {
        $request->validate([
            'id_servis'      => 'required',
            'id_mekanik'     => 'required',
            'jenis_servis'   => 'required',
            'tanggal_servis' => 'required|date',
        ]);

        $servis = Servis::findOrFail($id_servis);

        $servis->update([
            'id_servis'      => $request->id_servis,
            'id_mekanik'     => $request->id_mekanik,
            'jenis_servis'   => $request->jenis_servis,
            'tanggal_servis' => $request->tanggal_servis,
        ]);

        return redirect()->route('servis.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function destroy($id_servis): RedirectResponse
    {
        //get product by ID
        $servis = Servis::findOrFail($id_servis);

        //delete product
        $servis->delete();

        //redirect to index
        return redirect()->route('servis.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

     // Search method
     public function search(Request $request)
     {
         $query = $request->input('query');
         $servis = Servis::where('jenis_servis', 'LIKE', "%{$query}%")
                         ->orWhere('id_servis', 'LIKE', "%{$query}%")
                         ->paginate(10); // Adjust pagination as needed
 
         return view('servis.index', compact('servis'));
     }
}
