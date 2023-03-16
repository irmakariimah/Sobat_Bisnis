<?php

namespace App\Http\Controllers;

use App\Models\Kursusbisnis;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class KursusDashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.kursusbisnis.addkursus',[
            "title" => "Kursus Bisnis",
            "kursusbisnis" => kursusbisnis::all()
        ]
    );

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
        $validatedData = $request -> validate([
            'tema' => 'required|max:225',
            'title' => 'required|max:225',
            'isi' => 'required|max:225',
            'tanggaldaftar' => 'required|max:225',
            'tanggaltutup' => 'required|max:225',
            'tanggalmulai' => 'required|max:225',
            'durasi' => 'required|max:225',
            'kelaslive' => 'required|max:225',
            'harga' => 'required|max:225',
            'link' => 'required|max:225',  
            'foto' => 'image|file|max:1024',
        ]);
        $validatedData["slug"] = Str::slug($request->title);
        $validatedData["juduldepan"] = Str::slug($request->title);
        $validatedData["admin_id"] = session("LoggedAdmin")->id;
        
        if($request->file('foto')){
            $validatedData['foto']= $request->file('foto')->store('post-images');
        }
        // storing data
        $post = new Kursusbisnis;
        $post->juduldepan = Str::slug($request->title);
        $post->tema = $request->tema;
        $post->title = $request->title;
        $post->isi = $request->isi;
        $post->tanggaldaftar = $request->tanggaldaftar;
        $post->tanggaltutup = $request->tanggaltutup;
        $post->tanggalmulai = $request->tanggalmulai;
        $post->durasi = $request->durasi;
        $post->kelaslive = $request->kelaslive;
        $post->harga = $request->harga;
        $post->link = $request->link;
        $post->foto = $request->file('foto')->store('post-images');
        $post->admin_id = session("LoggedAdmin")->id;
        
        
        if($post->save()){
            return redirect('/dashboard/postskursus')->with('addSuccess', 'Konten Baru Berhasil ditambahkan');
        }
        
        return redirect('/dashboard/postskursus')->with('addFailed', 'Konten Baru Tidak Berhasil ditambahkan');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kursusbisnis  $kursusbisnis
     * @return \Illuminate\Http\Response
     */
    public function show(Kursusbisnis $kursusbisnis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kursusbisnis $kursusbisnis
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kursusbisnis = Kursusbisnis::find($id);
        return view('dashboard.kursusbisnis.editkursus',[
            "title" => "Kursus Bisnis",
            "kursusbisnis" => $kursusbisnis
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kursusbisnis  $kursusbisnis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $post = Kursusbisnis::find($id);

        $post->juduldepan = Str::slug($request->title);
        $post->title = $request->title;
        $post->tema = $request->tema;
        $post->isi = $request->isi;
        $post->tanggaldaftar = $request->tanggaldaftar;
        $post->tanggaltutup = $request->tanggaltutup;
        $post->tanggalmulai = $request->tanggalmulai;
        $post->durasi = $request->durasi;
        $post->kelaslive = $request->kelaslive;
        $post->harga = $request->harga;
        $post->link = $request->link;

        if($request->file('foto')){
            $post->foto = $request->file('foto')->store('post-images');
        }else{
            $post->foto = $request->foto;
        }

        if($post->save()){
            return redirect("/dashboard/index");
        }else{
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kursusbisnis  $kursusbisnis
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $kursusbisnis = Kursusbisnis::findorFail($id);
        Storage::delete('public/post-images/'.$kursusbisnis->foto);
        $kursusbisnis->delete();

        if($kursusbisnis){
            return redirect('/dashboard/index')->with('delSuccess', 'Konten berhasil dihapus');
        }
    }
}

