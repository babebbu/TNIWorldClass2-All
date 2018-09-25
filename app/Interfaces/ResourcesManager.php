<?php

namespace App\Interfaces;

interface ResourcesManager
{
    public static function index();
    public function create($param);
    public static function read($param);
    public static function update($param);
    public static function drop($param);
}