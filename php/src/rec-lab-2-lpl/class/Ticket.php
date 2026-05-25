<?php

namespace class;
class Ticket
{
    private $apellido;
    private $nombre;
    private $documento;
    private $email;
    private $tipo;
    private $vehiculo;
    private array $servicios;
    private array $pagos;

    private $costServicio = [
        'lavado-chasis' => 20000,
        'lavado-motor' => 5000,
        'interior' => 5000,
        'completo' => 22000,
        'encerado' => 5000,
    ];

    /**
     * @param $apellido
     * @param $nombre
     * @param $documento
     * @param $email
     * @param $tipo
     * @param $vehiculo
     * @param array $servicios
     * @param array $pagos
     */
    public function __construct(
        $apellido,
        $nombre,
        $documento,
        $email,
        $tipo,
        $vehiculo,
        array $servicios = [],
        array $pagos = []
    )
    {
        $this->apellido = $apellido;
        $this->nombre = $nombre;
        $this->documento = $documento;
        $this->email = $email;
        $this->tipo = $tipo;
        $this->vehiculo = $vehiculo;
        $this->servicios = $servicios;
        $this->pagos = $pagos;
    }

    /**
     * @return mixed
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @return mixed
     */
    public function getDocumento()
    {
        return $this->documento;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @return mixed
     */
    public function getVehiculo()
    {
        return $this->vehiculo;
    }

    public function getServicios(): array
    {
        return $this->servicios;
    }

    public function getPagos(): array
    {
        return $this->pagos;
    }

    public function getDetalleTicket()
    {
        $porcentaje = 1;
        if($this->vehiculo == 'moto'){
            $porcentaje = .8;
        } elseif ($this->vehiculo == 'caminoneta') {
            $porcentaje = 1.2;
        }

        $result = '';
        $total = 0;
        foreach ($this->servicios as $key => $value ){
            $costoServicio = $this->costServicio[$key] * $porcentaje;
            $result .= "<tr>";
            $result .= "<td>{$value}</td>";
            $result .= "<td>$ {$costoServicio}</td>";

            $result .= "</tr>";
            $total += $costoServicio;
        }
        $result .= "<tr>";
        $result .= "<td>Total</td>";
        $result .= "<td>$ {$total}</td>";
        $result .= "</tr>";

        return $result;
    }

    public function getFullName()
    {
        return $this->apellido . ', ' . $this->nombre;
    }

    public function getFormasPago()
    {
        $resutl = '';
        foreach ($this->pagos as $key => $pago){
            $resutl .= $pago .',';
        }

        return substr($resutl, 0, strlen($resutl) -1);
    }

}