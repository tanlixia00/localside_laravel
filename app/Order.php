<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "orders"; 

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function books()
    {
        return $this->belongsToMany('App\Book', 'product_order', 'order_id', 'book_id')
                    ->withPivot('quantity', 'harga_satuan', 'subtotal');
    }

    public function insertProduct($cart, $user)
    {
        $total = 0;
        foreach ($cart as $id =>$detail)
        {
            //lakukan update stok buku sejumlah minus quantity
            DB::select(DB::raw("update products set stok=stok-".$detail['quantity']." where id=".$id));

            $total += $detail['price'] * $detail['quantity'];
            $this->books()->attach($id,['quantity' =>$detail['quantity'], 'harga_satuan' =>$detail['price'], 'subtotal' =>$detail['price']*$detail['quantity']]);
        }
        return $total;
    }
}