<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Writings_inner extends Model
{
    protected $fillable = [
        'id_companies',
        'title',
        'description',
        'from',
        'to',
        'number_of_facture',
    ];
}
