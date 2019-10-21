<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Challenge;

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
     * @return mixed
     */
    public function handle()

{

\Log::info("Cron is working fine!");


//Write your database logic we bellow:

Challenge::create(
		['name'=>'hello new',
		'amount' => 2,
		'portion' => 52,
		'description' => 'hahaha',
		'user_id' => 1
		
		]
		
);



$this->info('Demo:Cron Cummand Run successfully!');

}


}
