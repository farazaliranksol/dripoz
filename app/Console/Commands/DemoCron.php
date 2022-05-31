<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Campaign;
use App\Models\CampaignHistory;
use App\Models\CampaignExecutionHistory;
use App\Jobs\StartCompaign;
class DemoCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demo:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // return 0;
        //write code regarding crons job
        $all_active_campaigns=Campaign::where('status',1)->get();
        foreach($all_active_campaigns as $d){
            $dis = new StartCompaign($d->id);
            dispatch($dis);
        }
    }
}
