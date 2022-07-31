<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
  
  public function index(){
    $category=Category::all();
             return $category->products()->paginate(15);}
            
}
