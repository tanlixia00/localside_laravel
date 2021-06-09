<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use App\Saran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Saran();
        $data->name = $request->get('nama');
        $data->email = $request->get('email');
        $data->notelp = $request->get('notelp');
        $data->isi_saran = $request->get('isi_saran');
        // dd($data);
        $data->save();

        // return redirect('frontend')->with('status','Kategori baru berhasil ditambah!!');
    }
    public function getSaran()
    {
         $query = Saran::all();
        return view('backend.saran',compact('query'));
    }
    public function getOrder()
    {
        //  $query = Order::all();
         $query= DB::select(DB::raw("select o.*, name from orders o inner join users u on o.user_id = u.id"));
         $query2= DB::select(DB::raw("SELECT order_id, p.title, po.quantity, po.harga_satuan FROM product_order po inner join products p on p.id = po.book_id"));
        return view('backend.order',compact('query', 'query2'));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
