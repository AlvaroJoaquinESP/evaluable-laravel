<?php

namespace App\Repositories;

use App\Models\Order;

class OrderRepository
{

    public function getAllByID($client_id)
    {
        return Order::where('client_id', $client_id)->get();
    }


    public function createOrder(Order $order)
    {
        $order->save();

        // SI HAGO RETURN DIRECTO DEVUELVE T O F EN LA SALIDA. ASÍ, MUESTRA EL OBJ ENTERO.
        return $order;
    }


    public function getByID($id)
    {
        // return Order::with('clients')->where('id', $id)->get(); DEVUELVE Array de obj
        return Order::with('clients')->find($id); // DEVUELVE Obj

    }


    public function cancel(Order $order)
    {
        $order->save();

        return $order;
    }
}
