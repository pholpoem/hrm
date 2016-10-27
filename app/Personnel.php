<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    protected $table = 'tb_personnels';
    protected $fillable = [
        'firstName',
        'lastName',
        'tel',
        'email',
        'position_id',
        'salary',
        'address',
        'province_id',
    ];
}