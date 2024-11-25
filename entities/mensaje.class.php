<?php
require_once 'entities/database/IEntity.class.php';
class Mensaje implements IEntity
{
    private $id;
    private $nombre;
    private $apellidos;
    private $asunto;
    private $email;
    private $texto;
    private $fecha;

    public function __construct($nombre = '', $apellidos = '', $email = '', $asunto = '', $texto = '')
    {
        $this->id = 0;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->asunto = $asunto;
        $this->email = $email;
        $this->texto = $texto;
        $this->fecha = date('Y-m-d H:i:s');
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getApellidos()
    {
        return $this->apellidos;
    }

    public function getAsunto()
    {
        return $this->asunto;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getTexto()
    {
        return $this->texto;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }

    public function setApellidos($apellidos): void
    {
        $this->apellidos = $apellidos;
    }

    public function setAsunto($asunto): void
    {
        $this->asunto = $asunto;
    }

    public function setEmail($email): void
    {
        $this->email = $email;
    }

    public function setTexto($texto): void
    {
        $this->texto = $texto;
    }

    public function setFecha($fecha): void
    {
        $this->fecha = $fecha;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'nombre' => $this->getNombre(),
            'apellidos' => $this->getApellidos(),
            'asunto' => $this->getAsunto(),
            'email' => $this->getEmail(),
            'texto' => $this->getTexto(),
            'fecha' => $this->getFecha()
        ];
    }
}
