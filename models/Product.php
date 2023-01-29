<?php

namespace Model;

class Product extends ActiveRecord
{

    protected static $tabla = "products";
    protected static $columnasDB = ["id", "name", "description", "type", "image", "price", "quantity"];

    public $id;
    public $name;
    public $description;
    public $type;
    public $image;
    public $price;
    public $quantity;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->name = $args['name'] ?? '';
        $this->description = $args['description'] ?? '';
        $this->type = $args['type'] ?? '';
        $this->image = $args['image'] ?? '';
        $this->price = $args['price'] ?? '';
        $this->quantity = $args['quantity'] ?? '';
    }

    public function validar()
    {
        if (!$this->name) {
            self::$alertas['error'][] = 'Debes ingresar un nombre';
        }
        if (!$this->description) {
            self::$alertas['error'][] = 'Debes ingresar una descripcion';
        }
        if (!$this->type) {
            self::$alertas['error'][] = 'Debes seleccionar un tipo de producto';
        }
        if (!$this->image) {
            self::$alertas['error'][] = 'Debes ingresar una imagen';
        }
        if (!$this->price) {
            self::$alertas['error'][] = 'Debes ingresar un precio';
        }
        if (!$this->quantity) {
            self::$alertas['error'][] = 'Debes ingresar una cantidad';
        }

        return self::$alertas;
    }
}
