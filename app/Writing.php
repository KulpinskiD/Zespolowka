<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Writing extends Model
{
    protected $fillable=[
        'id_companies',
        'title',
        'description',
        'from',
        'to',
        'number_of_facture',

    ];
    public function getCategoryListAttribute()
    {
        return $this->companies->pluck('id')->all();
    }
}
