<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private string $tableName = 'st_proxy_best';
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (Schema::hasTable($this->tableName)) { return; }

        Schema::create($this->tableName, function (Blueprint $table) {
            $table->string('proxy_id');
            $table->primary('proxy_id');
            
            $table->string('proxy_ip')->nullable();
            $table->unsignedSmallInteger('proxy_port')->nullable();
            $table->unsignedSmallInteger('proxy_success')->nullable();
            $table->unsignedSmallInteger('proxy_used')->nullable();
            $table->unsignedSmallInteger('proxy_captcha')->nullable();

            $table->dateTime('proxy_last_suc')->nullable();
            $table->dateTime('proxy_last_use')->nullable();
            $table->dateTime('proxy_last_captcha')->nullable();
            $table->dateTime('proxy_added')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists($this->tableName);
    }
};
