<?php

namespace App\Models;

abstract class Model
{
    protected $pdo;
    public function __construct()
    {
        $this->pdo = \App\Components\DB::getConnection();
    }
}
