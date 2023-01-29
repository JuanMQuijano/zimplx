<?php

namespace Model;

class Cart extends ActiveRecord
{

    protected static $tabla = "cart";
    protected static $columnasDB = ["id", "idProduct", "idUser"];

    public $id;
    public $idProduct;
    public $idUser;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->idProduct = $args['idProduct'] ?? '';
        $this->idUser = $args['idUser'] ?? '';
    }

    public function limpiar($id)
    {
        $query = "DELETE FROM cart WHERE idUser = '{$id}'";        
        $resultado = self::$db->query($query);

        return $resultado;
    }
}
