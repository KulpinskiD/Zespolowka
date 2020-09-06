<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable=[
        'id_users',
        'section',
        'description',
        'from',
        'number_of_facture',

    ];
    public function getCategoryListAttribute()
    {
        return $this->companies->pluck('id')->all();
    }
}
