<?php

class Ticket
{
    private string $apellido;
    private string $nombre;
    private string $dni;
    private string $fechaNacimiento;
    private string $email;
    private string $fecha;
    private array $destinos;

    /**
     * @param string $apellido
     * @param string $nombre
     * @param string $dni
     * @param string $fechaNacimiento
     * @param string $email
     * @param string $fecha
     */
    public function __construct(string $apellido, string $nombre, string $dni, string $fechaNacimiento, string $email, string $fecha)
    {
        $this->apellido = $apellido;
        $this->nombre = $nombre;
        $this->dni = $dni;
        $this->fechaNacimiento = $fechaNacimiento;
        $this->email = $email;
        $this->fecha = $fecha;
        $this->destinos = [];
    }

    public function getApellido(): string
    {
        return $this->apellido;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function getDni(): string
    {
        return $this->dni;
    }

    public function getFechaNacimiento(): string
    {
        return $this->fechaNacimiento;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getFecha(): string
    {
        return $this->fecha;
    }

    public function getDestinos(): array
    {
        return $this->destinos;
    }

    public function addDestino($destino): void
    {
        $this->destinos[] = $destino;
    }

    public function getFullname(): string
    {
        return $this->apellido . ', ' . $this->nombre;
    }

}