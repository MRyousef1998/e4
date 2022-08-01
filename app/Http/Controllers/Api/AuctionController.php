<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Auction;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\UserResource;
use App\Http\Resources\AuctionResource;
use Illuminate\Support\Facades\Auth;
use App\Models\AuctionBidder;

class AuctionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Auction  $auction
     * @return \Illuminate\Http\Response
     */
    public function show( $auction)
    {
        $auctions=Auction::find($auction);
        return new  AuctionResource($auctions);
    }
    public function showBidder( $auction)
    {
        $auctions=Auction::find($auction);
        $auctionBidder=$auctions->bidder_list;
        if(is_null($auctionBidder)){
           
            return [
           'auction_bidder'=>[],   
           ];
            
            }
        $bidderItems=json_decode($auctionBidder);
        $finalbidderItems=[];
        foreach($bidderItems as $bidderItem)
        {
         $user=User::find(intval ($bidderItem->user->id));
         
        $finalbidderItem=new \stdClass();
        $finalbidderItem->user=new UserResource($user);
        $finalbidderItem->qty=number_format(intval($bidderItem->qty));
       
        array_push($finalbidderItems,$finalbidderItem);
        
        }
        return [
            'auction_bidder'=>$finalbidderItems ,   
             'id'=>number_format(intval( $auctions->id)),
              // 'total'=>number_format(doubleval($cart-> total),2) ,
            ];
    }



//


public function AddBidder(Request $request){
            
    $request->validate([
       'auction_id'=>'required',
        'qty'=>'required'
    ]);
    $user = Auth::user();
 
    $auction_id=$request->input('auction_id');
    
    $auction=Auction::findOrFail($auction_id);
   
    
    $qty=$request->input('qty');
//////////

$bidderList=$auction->bidder_list;
        
if(is_null($bidderList)){
$bidderList=[];
   
} 
else{
    if(! is_array($bidderList))
$bidderList=json_decode($bidderList);
}
//return $user ;
$bidderList1=new AuctionBidder($user,$qty); 
// dd( $product);
array_push($bidderList,$bidderList1);

$auction->bidder_list=json_encode($bidderList);
//      $tempTotal=0;
//    foreach($cartItems as $cartItem){
//     $tempTotal+=($cartItem->qty * $cartItem->product->price); }
//    $this->total=$tempTotal;
$auction->save();
return $bidderList;


   /////
    // $auction->addUserBidder($user,$qty);
    // return   $auction;
    


}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Auction  $auction
     * @return \Illuminate\Http\Response
     */
    public function edit(Auction $auction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Auction  $auction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Auction $auction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Auction  $auction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Auction $auction)
    {
        //
    }
}
