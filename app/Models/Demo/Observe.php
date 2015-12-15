<?php

namespace App\Models\Demo;

use Illuminate\Database\Eloquent\Model;

class Observe extends Model
{
    protected $table = 'demo_observe';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title'];
}
