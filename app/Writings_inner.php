<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Writings_inner extends Model
{
    protected $fillable = [
        'title',
        'description',
        'from',
        'to',
    ];
}
