<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private string $tableName = 'st_proxy_list';
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
            $table->unsignedSmallInteger('proxy_code_check')->nullable();
            $table->unsignedSmallInteger('proxy_checks')->nullable();

            $table->unsignedTinyInteger('proxy_del')->nullable();

            $table->float('proxy_timer_check',9,6,true)->nullable();
            $table->float('proxy_timercon_check',9,6,true)->nullable();

            $table->timestamp('proxy_last_check')->nullable()->useCurrentOnUpdate();
            $table->dateTime('proxy_added')->useCurrent();
            

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
