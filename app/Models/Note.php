<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;  
     protected $table = 'table_notes'; 
    //table_notes = the name of the table in the database that this model represents.
    // 'note' is the only mass-assignable column in the table_notes table
    protected $fillable = ['note'];
}
