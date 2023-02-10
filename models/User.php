<?php

namespace Model;

class User extends ActiveRecord
{
    protected static $tabla = "users";
    protected static $columnasDB = ["id", "name", "lastname", "email", "password", "tipo", "date"];

    public $id;
    public $name;
    public $lastname;
    public $email;
    public $password;
    public $password2;
    public $tipo;
    public $date;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->name = $args['name'] ?? '';
        $this->lastname = $args['lastname'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->password2 = $args['password2'] ?? '';
        $this->tipo = 0;
        $this->date = date('Y-M-D');
    }

    public function validar()
    {
        if (!$this->name) {
            self::$alertas['error'][] = "Debes Ingresar Un Nombre";
        }
        if (!$this->lastname) {
            self::$alertas['error'][] = "Debes Ingresar Un Apellido";
        }
        if (!$this->email) {
            self::$alertas['error'][] = "Debes Ingresar Un Email";
        }
        if (!$this->password) {
            self::$alertas['error'][] = "Debes Ingresar Un Password";
        }
        if (strlen($this->password) < 6) {
            self::$alertas['error'][] = "El Password debe tener 6 caracteres o más";
        }

        if ($this->password !== $this->password2) {
            self::$alertas['error'][] = "Los Password deben coincidir";
        }

        return self::$alertas;
    }

    public function validarEmail()
    {
        if (!$this->email) {
            self::$alertas['error'][] = "Debes Ingresar Un Email";
        }

        return self::$alertas;
    }

    public function validarPassword()
    {
        if (!$this->password) {
            self::$alertas['error'][] = "Debes Ingresar Un Password";
        }
        if (strlen($this->password) < 6) {
            self::$alertas['error'][] = "El Password debe tener 6 caracteres o más";
        }

        return self::$alertas;
    }

    public function validarLogin()
    {
        if (!$this->email) {
            self::$alertas['error'][] = "Debes Ingresar Un Email";
        }
        if (!$this->password) {
            self::$alertas['error'][] = "Debes Ingresar Un Password";
        }

        return self::$alertas;
    }

    public function hashearPassword()
    {
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }
}
