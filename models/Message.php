<?php

namespace Model;

class Message extends ActiveRecord
{
    protected static $tabla = "messages";
    protected static $columnasDB = ["id", "name", "lastname", "email", "message"];

    public $id;
    public $name;
    public $lastname;
    public $email;
    public $message;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->name = $args['name'] ?? '';
        $this->lastname = $args['lastname'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->message = $args['message'] ?? '';
    }

    public function validar()
    {
        if (!$this->name) {
            self::$alertas['error'][] = 'Debes Ingresar un Nombre';
        }
        if (!$this->lastname) {
            self::$alertas['error'][] = 'Debes Ingresar un Apellido';
        }
        if (!$this->email) {
            self::$alertas['error'][] = 'Debes Ingresar un Email';
        }
        if (!$this->message) {
            self::$alertas['error'][] = 'Debes Ingresar un Mensaje';
        }

        return self::$alertas;
    }
}
