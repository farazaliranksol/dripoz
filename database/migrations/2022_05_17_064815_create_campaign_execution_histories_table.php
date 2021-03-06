<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignExecutionHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaign_execution_histories', function (Blueprint $table) {
            $table->id();
            $table->string('campaign_id',100);
            $table->string('phone_number',50);
            $table->string('sent_msg',100);
            $table->date('changed_date');
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
        Schema::dropIfExists('campaign_execution_histories');
    }
}
