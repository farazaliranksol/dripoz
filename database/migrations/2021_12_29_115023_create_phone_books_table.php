<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhoneBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phone_books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('status')->comment('0 for leads, 1 for DNC');
            $table->integer('user_id');
            $table->integer('camp_id');
            $table->biginteger('total_contacts');
            $table->integer('valid')->default(0);
            $table->integer('invalid')->default(0);
            $table->integer('duplicates')->default(0);
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phone_books');
    }
}
