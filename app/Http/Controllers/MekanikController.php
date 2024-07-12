<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

//import model product
use App\Models\mekanik;

//import return type View
use Illuminate\View\View;

//import return type redirectResponse
use Illuminate\Http\RedirectResponse;

use Carbon\Carbon;



class MekanikController extends Controller
{
     /**
     * index
     *
     * @return void
     */
    public function index(Request $request)
{
    $query = $request->input('search');
    $mekaniks = Mekanik::where('nama', 'LIKE', "%$query%")
                        ->orWhere('alamat', 'LIKE', "%$query%")
                        ->orWhere('notelp', 'LIKE', "%$query%")
                        ->orderBy('created_at', 'desc')
                        ->paginate(10);

    return view('mekaniks.index', compact('mekaniks'));
}

     /**
     * create
     *
     * @return View
     */
    public function create(): View
{

    return view('mekaniks.create');
}
    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
{
        //validate form
        $request->validate([
            'id_mekanik'        => 'required|numeric',
            'id_servis'         => 'required',
            'nama'              => 'required|string|max:255',
            'alamat'            => 'required|min:5',
            'notelp'            => 'required|numeric',
            'created_at'        => 'required|after_or_equal:8:00'
        ]);


        //create product
        Mekanik::create([
            'id_mekanik'     => $request->id_mekanik,
            'id_servis'      => $request->id_servis,
            'nama'           => $request->nama,
            'alamat'         => $request->alamat,
            'notelp'         => $request->notelp,
            'created_at'     => $request->created_at
        ]);

    //redirect to index
    return redirect()->route('mekaniks.index')->with(['success' => 'Data Berhasil Disimpan!']);
}

    /**
     * show
     *
     * @param  mixed $id
     * @return View
     */
    public function show(string $id_mekanik): View
{
    // get mekanik by ID
    $mekaniks = Mekanik::where('id_mekanik', $id_mekanik)->firstOrFail();

        //render view with mekanik
        return view('mekaniks.show', compact('mekaniks'));
}

    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(string $id_mekanik): View
    {
    $mekanik = Mekanik::where('id_mekanik', $id_mekanik)->firstOrFail(); 
    $mekanik->created_at = Carbon::parse($mekanik->created_at); // Ensure created_at is a Carbon instance
    return view('mekaniks.edit', compact('mekanik'));
    }
    
        
    public function update(Request $request, $id_mekanik): RedirectResponse
{
    //validate form
    $request->validate([
        'id_mekanik'    => 'required',
        'id_servis'     => 'required',
        'nama'          => 'required|min:3',
        'alamat'        => 'required|min:5',
        'notelp'        => 'required|numeric',
        'created_at'    => 'required'
    ]);

    // get mekanik by ID
    $mekanik = Mekanik::findOrFail($id_mekanik);

    // update mekanik data
    $mekanik->update([
        'id_mekanik' => $request->id_mekanik,
        'id_servis'  => $request->id_servis,
        'nama'       => $request->nama,
        'alamat'     => $request->alamat,
        'notelp'     => $request->notelp,
        'created_at' => $request->created_at
    ]);

    //redirect to index
    return redirect()->route('mekaniks.index')->with(['success' => 'Data Berhasil Diubah!']);
}
public function destroy($id_mekanik)
{
    //get product by ID
    $mekaniks = Mekanik::findOrFail($id_mekanik);

    //delete product
    $mekaniks->delete();

    //redirect to index
    return redirect()->route('mekaniks.index')->with(['success' => 'Data Berhasil Dihapus!']);
	
}

    
}

