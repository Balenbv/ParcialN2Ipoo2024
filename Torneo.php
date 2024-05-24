<?php

class Torneo{
    private $coleccionPartidos;
    private $precioPremio;

    public function __construct($coleccionPartidos, $precioPremio){
        $this->coleccionPartidos = $coleccionPartidos;
        $this->precioPremio = $precioPremio;
    }

    public function setColeccionPartidos($coleccionPartidos){
        $this->coleccionPartidos = $coleccionPartidos;
    }

    public function getColeccionPartidos(){
        return $this->coleccionPartidos;
    }

    public function setPrecioPremio($precioPremio){
        $this->precioPremio = $precioPremio;
    }

    public function getPrecioPremio(){
        return $this->precioPremio;
    }

    public function darPartidosBasquet(){
        $coleccionPartidosBasquet = [];
        foreach ($this->coleccionPartidos as $objPartido){
            if($objPartido instanceof PartidoBasquet){
                $coleccionPartidosBasquet[] = $objPartido;
            }
        }
        return $coleccionPartidosBasquet;
    }

    public function darPartidosFutbol(){
        $coleccionPartidosFutbol = [];
        foreach ($this->coleccionPartidos as $objPartido){
            if($objPartido instanceof PartidoFutbol){
                $coleccionPartidosFutbol[] = $objPartido;
            }
        }
        return $coleccionPartidosFutbol;
    }

    public function ingresarPartido($objEquipo1, $objEquipo2, $fecha, $tipoPartido){
    $objPartido = null;
    $numPatido = count($this->getColeccionPartidos());
    if ($objEquipo1->getObjCategoria() == $objEquipo2->getObjCategoria() && $objEquipo1->getCantJugadores() == $objEquipo2->getCantJugadores()){
        if($tipoPartido == 'futbol'){
            $objPartido = new PartidoFutbol($numPatido, $fecha, $objEquipo1, 0, $objEquipo2, 0);
            $coleccionPartidos[] = $this->getColeccionPartidos();
            array_push($coleccionPartidos, $objPartido);
            $this->setColeccionPartidos($coleccionPartidos);
        } else if($tipoPartido == 'basquet'){
            $objPartido = new PartidoBasquet($numPatido, $fecha, $objEquipo1, 0, $objEquipo2, 0 ,0);
            $coleccionPartidos[] = $this->getColeccionPartidos();
            array_push($coleccionPartidos, $objPartido);
            $this->setColeccionPartidos($coleccionPartidos);
        }
    }
    return $objPartido;
    }

    public function darGanadores($deporte){
        if ($deporte == 'futbol' ){
            $coleccionGanadores = $this->darPartidosFutbol();
        } else if ($deporte == 'basquet'){
            $coleccionGanadores = $this->darPartidosBasquet();
        }
        foreach ($this->getColeccionPartidos() as $objPartido){
                $coleccionGanadores[] = $objPartido->darEquipoGanador();
        }
        return $coleccionGanadores;
    }

    public function calcularPremioPartido($objPartido){
     return ['equipoGanador' => $objPartido->darEquipoGanador(), 'premio' => $this->getPrecioPremio() * $objPartido->darCoeficiente()];
    }

}