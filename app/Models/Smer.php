<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Smer extends Model
{
    protected $table = 'smerovi';

    protected $fillable = ['name'];

    public $timestamps = false;
}