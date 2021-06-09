<?php

namespace App\Http\Controllers;

use App\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    public function form_submit_front(){
        $this->authorize('checkmember');
        return view('frontend.checkout');
    }

    public function submit_front(){
        $this->authorize('checkmember');

        $cart = session()->get('cart');
        $user = Auth::user();
        $t = new Order;
        $t->user_id = $user->id;
        $t->created_at = Carbon::now()->toDateTimeString();
        $t->updated_at = Carbon::now()->toDateTimeString();
        $t->total_belanja = 0; //sementara diisi nol, nanti diupdate after get total
        $t->save();

        $totalharga = $t->insertProduct($cart, $user);
        $t->total_belanja = $totalharga;
        $t->save();

        session()->forget('cart');
        return redirect('/');
    }

    //untuk menampilkan riwayat order user
    public function showRiwayat(){
        $this->authorize('checkmember');
        $user = Auth::user();
        $id_user = $user->id;
        $data= DB::select(DB::raw("select * from orders where user_id=".$id_user));
        // dd($data, $id_user);
        return view('frontend.riwayat', compact('data'));
    }

    //untuk menampilkan detail riwayat order user
    public function viewDetail($id_order){
        $this->authorize('checkmember');
        $data= DB::select(DB::raw("SELECT b.title, b.price, b.gambar, bo.quantity, bo.harga_satuan, o.total_belanja, o.created_at, o.id as order_id FROM product_order bo inner join products b on bo.book_id = b.id inner join orders o on o.id = bo.order_id where bo.order_id=".$id_order));
        // dd($data);
        return view('frontend.detailRiwayat', compact('data'));
    }
}
