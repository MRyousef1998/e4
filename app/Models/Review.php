<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable=[
    'user_reviewer_id',
    'auction_id',
    'stars',

    'comment',];
    public function userReviewer(){
        return $this->belongsTo(User::class,'user_reviewer_id');
    }
    
}
