<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientManagementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_management', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('company_name',100);
            $table->string('address',100);
            $table->string('address_line_1',100)->nullable();
            $table->string('city',50);
            $table->string('zip_code',50);
            $table->string('state',50);
            $table->string('phone_number',25);
            $table->string('no_of_users',10);
            $table->string('website',25);
            $table->string('twilio_id',50);
            $table->string('status')->nullable()->default('Active');
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
        Schema::dropIfExists('client_management');
    }
}
