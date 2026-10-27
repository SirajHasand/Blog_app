<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    // Mass-assignable fields for the settings record
    protected $fillable = ['phone','logo','facebook'];
}
