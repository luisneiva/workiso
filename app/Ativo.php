<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Ativo extends Model
{

    protected $fillable = ['name', 'value', 'localization', 'type', 'observations'];

}
