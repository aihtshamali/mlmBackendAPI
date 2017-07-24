<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserModify extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phon')->nullable();
            $table->string('cardNo')->nullable();
            $table->string('dependent')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bankAccNo')->nullable();
            $table->string('bankRouteNo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
