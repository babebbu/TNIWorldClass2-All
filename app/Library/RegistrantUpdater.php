<?php

namespace App\Library;

use Illuminate\Http\Request;
use App\Http\Requests;

use DB;
use App\Models\FacebookRegistrants;
use App\Models\RegistrantProfiles;
use App\Models\RegistrantContacts;
use App\Models\RegistrantMedicals;
use App\Models\RegistrantMajors;
use App\Models\RegistrantAnswers;

abstract class RegistrantUpdater
{
    protected $registrant;
    protected $model;
    public $attributes = array();

    public function __construct($model = null)
    {
        if($model)
            $this->model = $model;
        else
            $this->model = null;
    }

    public function setModel($model)
    {
        $this->model = $model;
    }

    public function __set($name, $value)
    {
        $this->attributes[$name] = $value;
    }
    
    public function __get($name)
    {
        if (array_key_exists($name, $this->data)) {
            return $this->attributes[$name];
        }
        return null;
    }

    public function update(){
        //
    }
}