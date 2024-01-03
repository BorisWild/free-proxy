<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class ProxyBest extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'st_proxy_best';
    
    protected $primaryKey = 'proxy_id';

    protected $casts = ['proxy_id' => 'string'];

    public $timestamps = false;

    protected $guarded=[];
}
