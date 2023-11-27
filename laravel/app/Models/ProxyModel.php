<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProxyModel extends Model
{
    protected $table = 'st_proxy_list';
    protected $primaryKey = 'proxy_id';
    use HasFactory;
}
