<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Http\Requests\CreateOrderRequest;
use App\Services\Service;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ControllerGeneral extends Controller
{
    protected $orderService;
    protected $clientService;

    public function __construct(Service $order_service, Service $client_service)
    {
        $this->orderService = $order_service;
        $this->clientService = $client_service;
    }

    public function getAllByID($client_id)
    {
        $orders = $this->orderService->getAllByID($client_id);
        return ApiResponse::success($orders, "Orders found");
    }

    public function getByID($id)
    {
        $order = $this->orderService->getByID($id);

        return ApiResponse::success($order, 'Found', Response::HTTP_OK);
    }

    public function create(CreateOrderRequest $create_order_request)
    {
        /**
         * Creo un array asociativo con lo que recibe en el campo de la llamada.
         */
        $params = $create_order_request->all();

        /**
         * ¿Cómo puede ser que le pase un array de objetos?->¿Es acaso un array de un solo objeto?
         * LE PASO UN ARRAY ASOCIATIVO CON LO QUE RECIBE EN EL CAMPO DE LA LLAMADA.
         */
        $order = $this->orderService->create($params);

        return ApiResponse::success($order,'Order created successfully', Response::HTTP_CREATED);
    }


    public function cancel(Request $request)
    {
        /**
         * Traigo el id que le paso por llamada.
         */
        $id = $request->all();

        $order = $this->orderService->cancel($id);

        return ApiResponse::success($order,'Updated succesfully');
    }
}
