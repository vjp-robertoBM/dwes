<?php
// require_once 'entities/database/IEntity.class.php';
namespace proyecto\entities;

class Asociado implements database\IEntity
{
    const RUTA_LOGO = 'images/logo/';

    private $nombre;
    private $logo;
    private $descripcion;
    private $id;

    public function __construct($nombre = '',  $logo = '',  $descripcion = '', $id = 0)
    {
        $this->nombre = $nombre;
        $this->logo = $logo;
        $this->descripcion = $descripcion;
        $this->id = $id;
    }
    public function getNombre()
    {
        return $this->nombre;
    }

    public function getLogo()
    {
        return $this->logo;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }

    public function setLogo($logo): void
    {
        $this->logo = $logo;
    }

    public function setDescripcion($descripcion): void
    {
        $this->descripcion = $descripcion;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getUrlLogo(): string
    {
        return self::RUTA_LOGO . $this->getLogo();
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'nombre' => $this->getNombre(),
            'logo' => $this->logo->getFileName(),
            'descripcion' => $this->getDescripcion()
        ];
    }
}
