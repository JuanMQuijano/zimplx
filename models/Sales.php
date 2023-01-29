<?php

namespace Model;

use Model\ActiveRecord;

class Sales extends ActiveRecord
{
    protected static $tabla = "sales";
    protected static $columnasDB = ["id", "idUser", "idProduct_Car", "address", "phone", "price", "total_price", "date", "status"];

    public $id;
    public $idUser;
    public $idProduct_Car;
    public $address;
    public $phone;
    public $price;
    public $total_price;
    public $date;
    public $status;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->idUser = $args['idUser'] ?? '';
        $this->idProduct_Car = $args['idProduct_Car'] ?? '';
        $this->address = $args['address'] ?? '';
        $this->phone = $args['phone'] ?? '';
        $this->price = $args['price'] ?? '';
        $this->total_price = $args['total_price'] ?? '';
        $this->date = Date('Y/m/d');
        $this->status = $args['status'] ?? 'Espera';        
    }    
}
