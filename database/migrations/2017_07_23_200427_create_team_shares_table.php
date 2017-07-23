<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamSharesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_shares', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('by_user_id')->unsigned();
          $table->integer('to_user_id')->unsigned();
          $table->integer('phoneNo');
          $table->string('email')->default(null);
          $table->boolean('joined')->default(0);
          $table->string('fb')->default(null);
          $table->string('google')->default(null);
          $table->timestamps();

          //  Laravel also provides support for creating foreign key constraints,
         // which are used to force referential integrity at the database level

         $table->foreign('by_user_id')->references('id')->on('users');
         $table->foreign('to_user_id')->references('id')->on('users');

         //To drop a foreign key, you may use the dropForeign method.
         // Foreign key constraints use the same naming convention as indexes
         $table->dropForeign(['by_user_id']);
         $table->dropForeign(['to_user_id']);
         $table->foreign('by_user_id')
              ->references('id')->on('users')
              ->onDelete('cascade')
              ->onUpdate('cascade');
         $table->foreign('to_user_id')
              ->references('id')->on('users')
              ->onDelete('cascade')
              ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('team_shares');
    }
}
