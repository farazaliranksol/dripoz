<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientUserPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_user_permissions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->tinyInteger('inbox')->nullable();
            $table->tinyInteger('phone_number')->nullable();
            $table->tinyInteger('export_leads')->nullable();
            $table->tinyInteger('ai_rules')->nullable();
            $table->tinyInteger('billing')->nullable();
            $table->tinyInteger('tools')->nullable();
            $table->tinyInteger('logs')->nullable();
            $table->tinyInteger('console')->nullable();
            $table->tinyInteger('view_leads')->nullable();
            $table->tinyInteger('sound_library')->nullable();
            $table->tinyInteger('view_reports')->nullable();
            $table->tinyInteger('make_payments')->nullable();
            $table->tinyInteger('alerts')->nullable();
            $table->tinyInteger('api')->nullable();
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
        Schema::dropIfExists('client_user_permissions');
    }
}
