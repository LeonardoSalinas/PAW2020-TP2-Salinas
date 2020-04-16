<?php

namespace App\controllers;
use App\model\listTurnos;
use App\model\turnoModel;
use App\core\Persistencia;


class TurnosListController
{
    public function list()
    {
        include "views/turnosview.php";
    }

    public function ficha()
    {
       echo $ar= $_GET['i'];
        include "views/fichaview.php";
    }
}