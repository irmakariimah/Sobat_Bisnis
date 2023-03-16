<?php

namespace App\Http\Controllers;

use App\Models\Edubisnis;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.edukasibisnis.addedukasi',[
            "title" => "Edukasi Bisnis",
            "edubisnis" => edubisnis::all()
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
            'filter' => 'required|max:225',
            'tema' => 'required|max:225',
            'title' => 'required|max:225',
            'author' => 'required|max:225',
            'publish_at' => 'required|max:225',
            'titlebawah' => 'required|max:225',
            'foto' => 'image|file|max:1024',
            'kontenatas' => 'required',
            'kontenbawah' => 'required',  
        ]);
        // generate slug
        $validatedData["slug"] = Str::slug($request->title);
        $validatedData["juduldepan"] = Str::slug($request->title);
        $validateData["admin_id"] = session("LoggedAdmin")->id;
        
        if($request->file('foto')){
            $validatedData['foto']= $request->file('foto')->store('post-images');
        }

       
        // storing data
        $post = new Edubisnis;
        $post->filter = $request->filter;
        $post->juduldepan = Str::slug($request->title);
        $post->tema = $request->tema;
        $post->title = $request->title;
        $post->author = $request->author;
        $post->publish_at = $request->publish_at;
        $post->titlebawah = $request->titlebawah;
        $post->foto = $request->file('foto')->store('post-images');
        $post->kontenatas = $request->kontenatas;
        $post->kontenbawah = $request->kontenbawah;
        $post->admin_id = session("LoggedAdmin")->id;
        
        
        if($post->save()){
            return redirect('/dashboard/postsedukasi')->with('addSuccess', 'Konten Baru Berhasil ditambahkan');
        }
        
        return redirect('/dashboard/postsedukasi')->with('addFailed', 'Konten Baru Tidak Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Edubisnis  $edubisnis
     * @return \Illuminate\Http\Response
     */
    public function show(Edubisnis $edubisnis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Edubisnis  $edubisnis
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edubisnis = Edubisnis::find($id);
        return view('dashboard.edukasibisnis.editedukasi',[
            "title" => "Edukasi Bisnis",
            "edubisnis" => $edubisnis
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Edubisnis  $edubisnis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //retreiving data
        $post = Edubisnis::find($id);

        $post->filter = $request->filter;
        $post->juduldepan = Str::slug($request->title);
        $post->title = $request->title;
        $post->tema = $request->tema;
        $post->author = $request->author;
        $post->publish_at = $request->publish_at;
        $post->titlebawah = $request->titlebawah;
        $post->kontenatas = $request->kontenatas;
        $post->kontenbawah = $request->kontenbawah;

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
     * @param  \App\Models\Edubisnis  $edubisnis
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $edubisnis = edubisnis::findorFail($id);
        Storage::delete('public/post-images/'.$edubisnis->foto);
        $edubisnis->delete();

        if($edubisnis){
            return redirect('/dashboard/index')->with('delSuccess', 'Konten berhasil dihapus');
        }
    }
}
