<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProxyBestModel extends Model
{
    use HasFactory;
    
    protected $table = 'st_proxy_best';
    protected $primaryKey = 'proxy_ip';

    public $timestamps = false;

    protected $guarded=[];
}
