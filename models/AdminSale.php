<?php

namespace Model;

class AdminSale extends ActiveRecord
{
    protected static $tabla = 'sales';
    protected static $columnasDB = ["id", "date", "cliente", "idUser", "phone", "address", "productos", "price", "total_price", "status"];

    public $id, $date, $cliente, $idUser, $phone, $address, $productos, $price, $total_price, $status;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->date = $args['date'] ?? '';
        $this->cliente = $args['cliente'] ?? '';
        $this->idUser = $args['idUser'] ?? '';
        $this->phone = $args['phone'] ?? '';
        $this->address = $args['address'] ?? '';
        $this->productos = $args['productos'] ?? '';
        $this->price = $args['price'] ?? '';
        $this->total_price = $args['total_price'] ?? '';
        $this->status = $args['status'] ?? '';
    }
}
