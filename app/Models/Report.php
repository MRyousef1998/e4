<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $fillable=[
            'user_id',
            'auction_id',
            'report_type_id',
            'message',
            'title',
            'status'
    ];
    public function reportType(){
        return $this->belongsTo(ReportType::class,'report_type_id','id');
    }

    
}
