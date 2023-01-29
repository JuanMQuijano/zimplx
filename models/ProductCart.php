<?php

namespace Model;

class ProductCart extends ActiveRecord
{
    protected static $tabla = "products";
    protected static $columnasDB = ["id", "name", "price", "image"];

    public $id;
    public $name;
    public $price;
    public $image;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->name = $args['name'] ?? '';
        $this->price = $args['price'] ?? '';
        $this->image = $args['image'] ?? '';
    }

    public static function select($id)
    {
        $query = "SELECT p.id, p.name, p.price, p.image FROM products as p INNER JOIN cart as c";
        $query .= " ON p.id = c.idProduct WHERE c.idUser = '{$id}'";
        $resultado = self::consultarSQL($query);

        return $resultado;
    }

    public static function delete($idProduct, $idUser)
    {
        $query = "DELETE FROM cart WHERE idProduct = '{$idProduct}' AND idUser = '{$idUser}' LIMIT 1";
        $resultado = self::$db->query($query);

        return $resultado;
    }
}
