<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProxyBestModel extends Model
{
    use HasFactory;
    
    protected string $table = 'st_proxy_best';
    protected string $primaryKey = 'proxy_ip';
    
}
