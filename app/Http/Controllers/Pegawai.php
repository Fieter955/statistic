<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Score;

class Pegawai extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $scores = Score::all();
        
        
    
        return view('pegawai.pegawai', [
            'scores' => $scores
        ]);
    }
    

    public function tabelFrekuensi(){
        $scoreFrequencies = Score::groupBy('skor')
        ->selectRaw('skor, count(*) as count')
        ->orderBy('skor', 'asc')
        ->get()
        ->map(function ($item, $index) {
            $item['nomor'] = $index + 1;
            return $item;
        });
    
        return view('pegawai.tabelFrekuensi', [
            'scoreFrequencies' => $scoreFrequencies,
        ]);
    }


    public function search(Request $request)
    {
        $skor = $request->input('skor');
        $scores = Score::where('skor', $skor)->get();
        return view('pegawai.search', [
            'scores'=>$scores
        ]);
    }


    public function bergolong()
    {
        $scores = Score::all();
        
        // Mengambil nilai minimum dan maksimum dari skor
        $minScore = $scores->min('skor');
        $maxScore = $scores->max('skor');
    
        // Menentukan jumlah kelas interval (bisa disesuaikan)
        $jumlahKelas = 5;
        
        // Menghitung lebar interval
        $intervalWidth = ceil(($maxScore - $minScore) / $jumlahKelas);
    
        // Mengelompokkan data skor ke dalam kelas interval
        $scoreGroups = [];
        for ($i = 0; $i < $jumlahKelas; $i++) {
            $lowerBound = $minScore + ($i * $intervalWidth);
            $upperBound = $lowerBound + $intervalWidth - 1;
            $count = $scores->whereBetween('skor', [$lowerBound, $upperBound])->count();
    
            // Menyimpan data kelas interval, nilai tengah, dan frekuensi
            $scoreGroups[] = [
                'kelas_interval' => "$lowerBound - $upperBound",
                'nilai_tengah' => ($lowerBound + $upperBound) / 2,
                'frekuensi' => $count,
            ];
        }
    
        return view('pegawai.bergolong', [
            'scores' => $scores,
            'scoreGroups' => $scoreGroups,
        ]);
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

    public function handleForm(Request $request){
        Score::create([
            'skor' => $request->skor,
        ]);
       
        return redirect('/crud');
    }


    public function crudEdit($id)
    {
        $score = Score::findOrFail($id); // Mengambil data skor berdasarkan ID
        return view('pegawai.edit', ['score' => $score]);
    }


    public function crud(){
        $scores = Score::all();
        return view('pegawai.crud', [
            'scores'=>$scores
        ]);
    }

    public function destroy(Score $score)
    {
        $score->delete();
        return redirect('/crud')->with('success', 'Data berhasil dihapus');
    }

    public function add(){
        return view('pegawai.add');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, Score $score)
    {
        $score->update([
            'skor' => $request->skor,
        ]);
    
        return redirect('/crud')->with('success', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

}
