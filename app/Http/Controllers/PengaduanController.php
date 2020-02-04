<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Penduduk;
use App\InputAspirasi;
use App\StatusAspirasi;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aspirasis = InputAspirasi::with('penduduk', 'statusAspirasi')->get();
        return view('main.dashboard-admin', ['aspirasis' => $aspirasis]);
    }

    public function histori(){
        $aspirasis = InputAspirasi::whereHas('statusAspirasi', function ($query) {
            $query->where([
                ['status', '=', 'Selesai'],
                ['feedback', '!=', 'Blank']
            ]);
        })->with('penduduk', 'statusAspirasi')->get();
        return view('main.histori-admin', ['aspirasis' => $aspirasis]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nik' => 'required',
            'alamat' => 'required',
            'lokasi' => 'required'
        ]);
        
        $idPelaporan = rand(111111, 999999);

        if (Penduduk::get()->where('id_penduduk', $request->nik)->count() > 0) {
            InputAspirasi::create([
                'id_pelaporan' => $idPelaporan,
                'id_penduduk' => $request->nik,
                'jenis_aspirasi' => $request->jenis_aspirasi,
                'lokasi' => $request->lokasi
            ]);
            StatusAspirasi::create([
                'id_pelaporan' => $idPelaporan,
                'status' => 'Proses',
                'feedback' => 'blank'
            ]);
        }else{
            Penduduk::create([
                'id_penduduk' => $request->nik,
                'alamat' => $request->alamat
            ]);
            InputAspirasi::create([
                'id_pelaporan' => $idPelaporan,
                'id_penduduk' => $request->nik,
                'jenis_aspirasi' => $request->jenis_aspirasi,
                'lokasi' => $request->lokasi
            ]);
            StatusAspirasi::create([
                'id_pelaporan' => $idPelaporan,
                'status' => 'Proses',
                'feedback' => 'Blank'
            ]);
        }
        
        return redirect()->back()->with('success', $idPelaporan);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    public function pencarian(Request $request){

        if (!empty($request->search)) {
            $aspirasis = InputAspirasi::with('penduduk', 'statusAspirasi')
                ->where('id_pelaporan', 'LIKE', "%$request->search%")
                ->orWhere('id_penduduk', 'LIKE', "%$request->search%")
                ->get();
            return view('main.pencarian', ['aspirasis' => $aspirasis]);
        }else{
            return redirect('pencarian');
        }
    }

    // Masih belum dpt jawaban kayak dia
    public function filter(Request $request){
        $aspirasis = InputAspirasi::with('penduduk', 'statusAspirasi')
            ->whereHas('statusAspirasi', function ($query) use($request) {
                $query->where('feedback', 'LIKE', "%$request->key%");    
            })
            ->where('jenis_aspirasi', 'LIKE', "%$request->jenis_aspirasi%")
            ->get();
        return $aspirasis;
    }

    // Masih belum dpt jawaban kayak dia
    public function filterHistori(Request $request){
        $historis = '';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_pelaporan)
    {
        StatusAspirasi::where('id_pelaporan', $id_pelaporan)->update(['status' => 'Selesai']);
        return redirect()->back()->with('success', "Aspirasi berhasil diselesaikan");
    }

    public function feedback(Request $request, $id_pelaporan){
        StatusAspirasi::where('id_pelaporan', $id_pelaporan)->update(['feedback' => $request->status]);
        return redirect('pencarian');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        InputAspirasi::where('id_pelaporan', $id)->delete();
        StatusAspirasi::where('id_pelaporan', $id)->delete();
        return redirect()->back()->with('success', "Aspirasi berhasil dihapus");
    }
}
