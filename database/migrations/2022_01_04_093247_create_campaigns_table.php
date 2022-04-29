<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('user_id');
            $table->string('long_transfer');
            $table->string('close_lead');
            $table->string('close_duration');
            $table->float('revenue');
            $table->tinyInteger('long_transfer_check')->default('0')->nullable()->comment('1 for enable');
            $table->tinyInteger('close_leads_check')->default('0')->nullable()->comment('1 for enable');
            $table->integer('report_rule');
            $table->string('ai_rules')->nullable();
            $table->boolean('voice_scheduling_check')->default('0')->nullable()->comment('1 for enable ');
            $table->integer('leads_per_day')->default('0')->nullable();
            $table->string('number_list');
            $table->boolean('local_match_Check')->default('0')->nullable()->comment('1 for enable ');
            $table->string('delivery_type');
            $table->string('cps');
            $table->string('keyword');
            $table->string('message');
            $table->integer('sms_per_min');
            $table->integer('concurrent_transfer');
            $table->float('max_CSP');
            $table->boolean('record_call_check')->default('0')->nullable()->comment('1 for enable ');
            $table->boolean('fallback_transfer_check')->default('0')->nullable()->comment('1 for enable ');
            $table->integer('fallback_timeout')->nullable();
            $table->string('fallback_number')->nullable();
            $table->boolean('scheduling_check')->default('0')->nullable()->comment('1 for enable ');
            $table->boolean('rescheduling_check')->default('0')->nullable()->comment('1 for enable ');
            $table->integer('max_scheduling_month')->default('0')->nullable()->comment('1 for enable ');
            $table->boolean('in_outbound_check')->default('0')->nullable()->comment('1 for enable ');
            $table->string('status')->default('Runing')->nullable();
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
        Schema::dropIfExists('campaigns');
    }
}
