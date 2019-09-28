<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

class Task1 extends Model
{
    protected $table = 'task1';

    public $timestamps = false;

    protected $fillable = ['login'];
}
