<?php

class InfoTicket{
    private string $origen;
    private string $destino;
    private $hora_partida;
    private $hora_llegada;

    private int $duracion;

    /**
     * @param $origen
     * @param $destino
     * @param $hora_partida
     * @param $hora_llegada
     * @param $duracion
     */
    public function __construct($origen, $destino, $hora_partida, $hora_llegada, $duracion)
    {
        $this->origen = $origen;
        $this->destino = $destino;
        $this->hora_partida = $hora_partida;
        $this->hora_llegada = $hora_llegada;
        $this->duracion = $duracion;
    }

    /**
     * @return string
     */
    public function getOrigen(): string
    {
        return $this->origen;
    }

    /**
     * @return string
     */
    public function getDestino(): string
    {
        return $this->destino;
    }

    /**
     * @return mixed
     */
    public function getHoraPartida()
    {
        return $this->hora_partida;
    }

    /**
     * @return mixed
     */
    public function getHoraLlegada()
    {
        return $this->hora_llegada;
    }

    public function getDuracion(): int
    {
        return $this->duracion;
    }

    public function toArray(): array
    {
        return[
            'origen' => $this->origen,
            'destino' => $this->destino,
            'hora_partida' => $this->hora_partida,
            'hora_llegada' => $this->hora_llegada,
            'duracion' => $this->duracion
        ];
    }
}