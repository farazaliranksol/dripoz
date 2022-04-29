<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAiTriggersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ai_triggers', function (Blueprint $table) {
            $table->id();
            $table->string('type',50);
            $table->string('match_type',50);
            $table->string('trigger',100);
            $table->string('action',50);
            $table->text('message')->nullable();
            $table->unsignedTinyInteger('fire_webhook')->nullable();
            $table->text('webhook')->nullable();
            $table->unsignedTinyInteger('fire_zapier')->nullable();
            $table->unsignedTinyInteger('fire_email')->nullable();
            $table->string('recipient',50)->nullable();
            $table->string('subject',100)->nullable();
            $table->text('email_message',100)->nullable();
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
        Schema::dropIfExists('ai_triggers');
    }
}
