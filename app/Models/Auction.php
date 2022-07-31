<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auction extends Model
{
    use HasFactory;
   protected $fillable=[
        'title',
        'description',
        'price',
        'minimum_increment',
        'user_id',
        'category_id',
        'num_increment',
        'end_time',
        'bidder_list'
    ];
    public function addUserBidder(User $user,$qty=1){
        
      return $user;
        $bidderList=$this->bidder_list;
        
          if(is_null($bidderList)){
          $bidderList=[];
             
       } 
        else{
              if(! is_array($bidderList))
          $bidderList=json_decode($bidderList);
          }
          return $user ;
        $bidderList1=new AuctionBidder($user,$qty); 
       // dd( $product);
        array_push($bidderList,$bidderList1);
       
        $this->bidder_list=json_encode($bidderList);
    //      $tempTotal=0;
    //    foreach($cartItems as $cartItem){
    //     $tempTotal+=($cartItem->qty * $cartItem->product->price); }
    //    $this->total=$tempTotal;
        return $bidderList;
       
   }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function aucationBidder(){
        return $this->belongsToMany(User::class);
    }
    
    public function images(){

        return $this->hasMany(Image::class);
    }
    public function reviews(){
        return $this->hasMany(Review::class);
    }
    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
    // public function user(){
    //     return $this->belongsTo(User::class,'user_id','id');
    // }
    
}
