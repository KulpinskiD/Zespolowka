<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Outer extends Model
{
    protected $fillable=[
        'id_companies',
        'title',
        'description',
        'from',
        'number_of_facture',


    ];
}
