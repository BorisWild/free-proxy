<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttachment extends Model
{
    use HasFactory, HasUuids;

    protected $table = "product_attachments";
    protected $guarded=[];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
