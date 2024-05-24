<?php

class partidoFutbol extends Partido{
    
    public function __construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2){
        parent::__construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2);
    }


    public function darCoeficiente(){
        $coeficienteRetorno =0;
        if (parent::getObjEquipo1()->getCategoria() == 'menores'){
            $coeficienteRetorno = parent::darCoeficiene() + 0.13;
        } else if(parent::getObjEquipo1()->getCategoria() == 'juveniles'){
            $coeficienteRetorno = parent::darCoeficiene() + 0.19;
        } else if (parent::getObjEquipo1()->getCategoria() == 'mayores'){
            $coeficienteRetorno = parent::darCoeficiene() + 0.27;
        }
        return parent::darCoeficiene() + $coeficienteRetorno;
    }

}