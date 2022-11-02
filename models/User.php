<?php

namespace Model;

class User extends ActiveRecord
{
    protected static $tabla = "users";
    protected static $columnasDB = ["id", "nombre", "apellido", "fechan", "email", "password", "token", "confirmado", "tipo"];

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->fechan = $args['fechan'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->password2 = $args['password2'] ?? '';
        $this->token = $args['token'] ?? '';
        $this->confirmado = $args['confirmado'] ?? 0;
        $this->tipo = $args['tipo'] ?? 0;
    }

    public function validar()
    {
        if (!$this->nombre) {
            self::$alertas['error'][] = "Debes Ingresar Un Nombre";
        }
        if (!$this->apellido) {
            self::$alertas['error'][] = "Debes Ingresar Un Apellido";
        }
        if (!$this->fechan) {
            self::$alertas['error'][] = "Debes Seleccionar Una Fecha de Nacimiento";
        }
        if (!$this->email) {
            self::$alertas['error'][] = "Debes Ingresar Un Email";
        }
        if (!$this->password) {
            self::$alertas['error'][] = "Debes Ingresar Un Password";
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

    public function hashearPassword()
    {
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }

    public function generarToken()
    {
        $this->token = uniqid();
    }
}
