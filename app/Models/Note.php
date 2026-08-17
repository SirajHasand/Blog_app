<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;  
     protected $table = 'table_notes'; 
    //table_notes = the name of the table in the database that this model represents.
    protected $fillable = ['note'];
    // note , the column name in the database table that we want to fill.
}
