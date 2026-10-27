<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes; // enables soft deletes so posts can be restored instead of permanently removed
    // Fields that can be mass-assigned when creating or updating a post
    protected $fillable = ['title', 'content','image','slug','profile_id'];

    public function profile(){
        return $this->belongsTo(Profile::class);
    }
}
