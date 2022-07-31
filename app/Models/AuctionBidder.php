<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class AuctionBidder 
{
    use HasFactory;
    public User $user;
   public int $qty;  
   public function __construct(User $user,$qty){
    $this->user=$user;
        $this->qty=$qty;
    
    }
}
