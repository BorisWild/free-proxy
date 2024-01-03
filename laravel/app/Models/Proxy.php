<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Proxy extends Model
{
    use HasFactory,HasUuids;
    
    protected $table = 'st_proxy_list';
    
    protected $primaryKey = 'proxy_id';

    protected $casts = ['proxy_id' => 'string'];

    protected $guarded=[];

    public $timestamps = false;
    
}
