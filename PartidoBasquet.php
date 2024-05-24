<?php

class PartidoBasquet extends Partido {
    private $cantidadInfracciones;
    private $coeficientePennalizacion;

    public function __construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2, $cantidadInfracciones){
        parent::__construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2);
        $this->cantidadInfracciones =  $cantidadInfracciones ;
        $this->coeficientePennalizacion =  0.75;
    }

    public function getCantidadInfracciones(){
        return $this->cantidadInfracciones;
    }

    public function setCantidadInfracciones($cantidadInfracciones){
        $this->cantidadInfracciones = $cantidadInfracciones;
    }

    public function getCoeficientePennalizacion(){
        return $this->coeficientePennalizacion;
    }

    public function setCoeficientePennalizacion($coeficientePennalizacion){
        $this->coeficientePennalizacion = $coeficientePennalizacion;
    }

    public function darCoeficiente(){
        return parent::darCoeficiene() -  ($this->getCoeficientePennalizacion() * $this->getCantidadInfracciones());
    }
}