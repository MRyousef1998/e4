<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use  App\Http\Resources\AuctionResource;
use App\Models\Auction;
use  App\Http\Resources\UserResource;
use App\Models\User;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\AuctionController;

use App\Http\Controllers\Api\AuthController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('categories', [CategoryController::class, 'index']);
Route::get('categories/{category}', [CategoryController::class,'show']);
Route::get('categories/{category}/auctions', [CategoryController::class,'showAucgtions']);


//Route::get('categories','Api\CategoryController@index');
//Route::get('categories/{category}','Api\CategoryController@show');

//Route::get('categories/{category}/','Api\CategoryController@showAucgtions');


Route::get('auctions/{auction}', [AuctionController::class, 'show']);

//Route::get('categories/{category}', [CategoryController::class,'show']);
//Route::get('categories/{category}/auctions', [CategoryController::class,'showAucgtions']);

//rigster
Route::post('auth/register', [AuthController::class,'register']);
Route::post('auth/login', [AuthController::class, 'login']);


//Route::post('auth/register','Api\@register');
//Route::post('','Api\AuthController@login');

Route::get('au', function (Request $request) {
    return AuctionResource::collection(Auction::all());

   // return UserFullResource::collection(User::paginate(15));
});
Route::get('users', function (Request $request) {
     $tag=App\Models\Auction::find(1);
    // return $tag->user;
    return new UserResource($tag->user);

   // return UserFullResource::collection(User::paginate(15));
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {

  $user = Auth::user();
  
  return $user;
});

Route::middleware('auth:sanctum')->group( function () {

Route::get('auctions/{auction}/bidder', [AuctionController::class, 'showBidder']);
   
Route::post('auctions/bid', [AuctionController::class, 'AddBidder']);
  
 
});



// Route::middleware('auth:sanctum')->post('auctions/bid',function ((Request $request) {





//     // Route::post('bid', [AuthController::class, 'login']);

//     // Route::post('carts','Api\CartController@AddProductToCart');
//     // Route::get('carts','Api\CartController@index');
//   });
 
