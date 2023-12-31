<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $title = "Landing Page";
        $packages = [
            (object)[
                'package_code' => 'Dummy Code',
                'package_name' => 'Dummy Name',
                'package_desc' => 'Dummy Desc'
            ],
            (object)[
                'package_code' => 'Dummy Code 2',
                'package_name' => 'Dummy Name 2',
                'package_desc' => 'Dummy Desc 2'
            ],
            (object)[
                'package_code' => 'Dummy Code 3',
                'package_name' => 'Dummy Name 3',
                'package_desc' => 'Dummy Desc 3'
            ]
        ];

        // Gunakan dd() untuk debug, pastikan variabel $packages memiliki nilai yang benar
      

        return view('frontpage.landing', compact('title', 'packages'));
    }

    public function about(){

        $title = "About";
        $packages = [
            (object)[
                'package_code' => 'Dummy Code',
                'package_name' => 'Dummy Name',
                'package_desc' => 'Dummy Desc'
            ],
            (object)[
                'package_code' => 'Dummy Code 2',
                'package_name' => 'Dummy Name 2',
                'package_desc' => 'Dummy Desc 2'
            ],
            (object)[
                'package_code' => 'Dummy Code 3',
                'package_name' => 'Dummy Name 3',
                'package_desc' => 'Dummy Desc 3'
            ]
        ];

        return view('frontpage.about', compact('title', 'packages'));
    }

    public function portofolio(){
        $title = "Portofolio";
        $packages = [
            (object)[
                'package_code' => 'Dummy Code',
                'package_name' => 'Dummy Name',
                'package_desc' => 'Dummy Desc'
            ],
            (object)[
                'package_code' => 'Dummy Code 2',
                'package_name' => 'Dummy Name 2',
                'package_desc' => 'Dummy Desc 2'
            ],
            (object)[
                'package_code' => 'Dummy Code 3',
                'package_name' => 'Dummy Name 3',
                'package_desc' => 'Dummy Desc 3'
            ]
        ];

        return view('frontpage.portofolio', compact('title', 'packages'));

    }

    public function contact(){
        $title = "Contact";
        $packages = [
            (object)[
                'package_code' => 'Dummy Code',
                'package_name' => 'Dummy Name',
                'package_desc' => 'Dummy Desc'
            ],
            (object)[
                'package_code' => 'Dummy Code 2',
                'package_name' => 'Dummy Name 2',
                'package_desc' => 'Dummy Desc 2'
            ],
            (object)[
                'package_code' => 'Dummy Code 3',
                'package_name' => 'Dummy Name 3',
                'package_desc' => 'Dummy Desc 3'
            ]
        ];

        return view('frontpage.contact', compact('title', 'packages'));
    }


    public function uji(){
        $title = "Contact";
        $packages = [
            (object)[
                'package_code' => 'Dummy Code',
                'package_name' => 'Dummy Name',
                'package_desc' => 'Dummy Desc'
            ],
            (object)[
                'package_code' => 'Dummy Code 2',
                'package_name' => 'Dummy Name 2',
                'package_desc' => 'Dummy Desc 2'
            ],
            (object)[
                'package_code' => 'Dummy Code 3',
                'package_name' => 'Dummy Name 3',
                'package_desc' => 'Dummy Desc 3'
            ]
        ];

        return view('frontpage.landinguji', compact('title', 'packages'));
    }

    public function utstekweb(){
        $datas = Book::all();
       
        return view('utstekweb.landing',[
            'datas'=>$datas
        ]);
    }


    public function utstekwebslug($slug){
        $data = Book::where('id', $slug)->first();
        

        return view('utstekweb.detail', [
            'data'=>$data
        ]);
    }

    public function inputbuku(){
       
        $datas = Book::all();
        return view('utstekweb.inputbuku', [
            'datas'=>$datas
        ]);
    }

    public function uplodimage(){
        return view('uplodimage.index');
    }

    public function store(Request $request){
        $judul = $request->judul;
        $penulis =$request->penulis;
        $pengarang =$request->pengarang;
        $tanggal =$request->tanggal;

        if($request->hasFile('image')){
            $file = $request->file('image');
            $fillname = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $fillname);


       

            $image = new Book;
            $image->Gambar = $fillname;
            $image->Judul_Buku = $judul;
            $image->Pengarang = $pengarang;
            $image->Penulis = $penulis;
            $image->Tanggal_Terbit = $tanggal;
            $image->user_id =1;
            $image->save();

            return view('utstekweb.inputbuku');
        }


    }

    public function makan(){
        return view('utstekweb.admin');
    }

    public function style(){
        return view('style');
    }

    public function register()
    {
        return view('utstekweb.layout.register');
    }

    public function login()
    {
        return view('utstekweb.layout.login');
    }

public function loginRequested(Request $request)
{
    // Mendapatkan semua data buku (sepertinya tidak terkait dengan proses login, perlu dicheck)
    $datas = Book::all();

    $credentials = $request->only('email', 'password');
    
    // Periksa nilai $credentials untuk debug
    // return $credentials;

    if (Auth::attempt($credentials)) {
        // Jika autentikasi berhasil
        $request->session()->regenerate();
        return redirect()->route('landing');
    } else {
        // Jika autentikasi gagal
        return view('utstekweb.layout.login', [
            'datas' => $datas
        ]);
    }
}




public function registerRequested(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|unique:users,name',
        'email' => 'required',
        'password' => 'required',
    ]);

    User::create($validated);
    return view('utstekweb.layout.login');
}



}
