<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function(Blueprint $table) {
            $table->increments('id');
            $table->string('contact_name');
            $table->integer('user_id')->unsigned();
            $table->string('email_address')->nullable();
            $table->string('website')->nullable();
            $table->string('job_title')->nullable();
            $table->string('company')->nullable();
            $table->string('description')->nullable();
            $table->string('address')->nullable();
            $table->text('mobile')->nullable();
            $table->text('work_phone')->nullable();
            $table->integer('home_phone')->nullable();
            $table->string('photo')->nullable();
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
        Schema::dropIfExists('contacts');
    }
}
