<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registries', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->text('label')->nullable();
            $table->longText('data');
            $table->string('filepath')->nullable();
            $table->string('access_token', 64)->nullable();
            $table->string('write_token', 64)->nullable();
            $table->foreignId('team_id')->nullable()->constrained()->cascadeOnDelete();
            $table->date('expired_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registries');
    }
};
