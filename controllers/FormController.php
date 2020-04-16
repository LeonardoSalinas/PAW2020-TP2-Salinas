<?php

namespace App\controllers;

use App\core\Controller;
use App\models\ToDoList;

class FormController 
{
    public function index()
    {
        include "views/mainview.php";
    }
}