<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Writings_outer extends Model
{
    protected $fillable=[
        'id_companies',
        'title',
        'description',
        'from',
        'number_of_facture',

    ];
    public function getCategoryListAttribute()
    {
        return $this->companies->pluck('id')->all();
    }
}
