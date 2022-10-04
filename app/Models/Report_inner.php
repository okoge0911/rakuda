<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report_inner extends Model
{
    use HasFactory;
    protected $table = "report_inners";

    // protected $fillable = [
    //     'body', 'report_id', 'created_at','updated_at'
    // ];
}
