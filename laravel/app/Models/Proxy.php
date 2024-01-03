<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proxy extends Model
{
    use HasFactory;
    
    protected $table = 'st_proxy_list';
    
    protected $primaryKey = 'proxy_id';

    protected $casts = ['proxy_id' => 'string'];

    protected $guarded=[];

    public $timestamps = false;
    
}
