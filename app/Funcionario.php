<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $fillable = [
        'id', 'nome', 'data_matricula', 'salario', 'cargo_id', 'cargo', 'level_id', 'level'
    ];

    public function cargo()
    {
        return $this->belongsTo('App\Cargo');
    }

    public function level()
    {
        return $this->belongsTo('App\Level');
    }
}
