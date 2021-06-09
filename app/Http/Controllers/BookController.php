<?php

namespace App\Http\Controllers;

use App\Book;
use App\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('index-permission');
        $query = Book::all();
        $kat = Category::all();
        return view('book.index',compact('query', 'kat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categori = Category::all();
        return view('book.createform',compact('categori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Book();
        //filename for img
        $fileName = time()."_".$request->get('namaBuku').".".$request->file('image_upload')->getClientOriginalExtension();
        
        $data->title = $request->get('namaBuku');
        $data->deskripsi = $request->get('publisherBuku');
        $data->price = $request->get('hargaBuku');
        $data->gambar = $fileName;
        $data->idKategori = $request->get('kategori');
        $data->stok = $request->get('stok');
        $data->save();
        
        // upload foto
        $destinationPath =  "images/";
        if ($request->hasFile('image_upload')) {
            //dd($data);    
            $request->image_upload->move($destinationPath, $fileName);
        }
        return redirect('book')->with('status','Data Buku berhasil ditambah!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        // $this->authorize('index.permission', $book);
        $data = $book;
        $kat = Category::all();
        return view('book.index',compact('data', 'kat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $data = $book;
        $kat = Category::all();
        return view('book.editform',compact('data', 'kat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //filename untuk upload img
        $fileName =  time()."_".$request->get('namaBuku').".".$request->file('image_upload')->getClientOriginalExtension();
        $book->title = $request->get('namaBuku');
        $book->deskripsi = $request->get('publisherBuku');
        $book->price = $request->get('hargaBuku');
        $book->gambar = $fileName;
        $book->idKategori = $request->get('kategori');
        $book->stok = $request->get('stok');
        $book->save();
        // upload foto
        $destinationPath =  "images/";
        if ($request->hasFile('image_upload')) {
            //dd($data);
            $request->image_upload->move($destinationPath, $fileName);
        }
        return redirect()->route('book.index')->with('status','Data Buku berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $this->authorize('delete-permission', $book);
        $book->delete();
        return redirect()->route('book.index')->with('status','Data Buku berhasil dihapus');
    }
}