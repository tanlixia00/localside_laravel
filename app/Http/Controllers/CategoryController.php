<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //index ini berfungsi sebagai landing page utama fitur category dan fungsi show category
        $this->authorize('index-permission');
        $query = Category::all();
        return view('kategori.index',compact('query'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategori.createform');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Category();
        $data->name = $request->get('namaCategory');
        $data->save();

        return redirect('category')->with('status','Kategori baru berhasil ditambah!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $data = $category;
        return view('kategori.editform',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category->name = $request->get('namaCategory');
        $category->save();
        return redirect()->route('category.index')->with('status','Data kategori berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        try {
            $category->delete();
            return redirect()->route('category.index')->with('status','Data Kategori berhasil dihapus');
        } catch (\PDOException $e) {
            $msg="Data Gagal dihapus. Pastikan data child sudah hilang atau tidak berhubungan";
            return redirect()->route('category.index')->with('status',
                $msg);
        }
    }

    //HINT untuk bantuan menghapus data child
    private function handleAllRemoveChild($s)
    {
        $s->books()->delete();
        $s->delete();
        return "Data dihapus beserta data yang berinteraksi dengan Kategori: $s->nama";
    }

    private function handleChildWithDefault($s)
    {
        $ps = $s->books();
        $alternatif = Category::where('id','<>',$s->id)->first();
        foreach($ps as $p)
        {
            $p->idKategori = ($alternatif)->id;
            $p->save();
        }
        $s->delete();

        return "Data dihapus dan beserta data yang berinteraksi dengan tersebut dialihkan kepada $alternatif->nama";
    }
}
