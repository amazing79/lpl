<?php

namespace Amazing79\Lpl;

class Usuario
{

    public function __construct(
        protected int $id,
        protected string $apellido,
        protected string $nombre,
        protected string $dni,
        protected ?\DateTime $fechaNacimiento = null
    ){
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getApellido(): string
    {
        return $this->apellido;
    }

    /**
     * @return string
     */
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * @return string
     */
    public function getDni(): string
    {
        return $this->dni;
    }

    /**
     * @return \DateTime
     */
    public function getFechaNacimiento(): \DateTime
    {
        return $this->fechaNacimiento ?? new \DateTime();
    }

    public function getFechaNacimientoPantalla(): string
    {
        return date("Y-m-d", $this->fechaNacimiento->getTimestamp());
    }
    public function getNombreCompleto(): string
    {
        return $this->nombre . ' ' . $this->apellido;
    }
}