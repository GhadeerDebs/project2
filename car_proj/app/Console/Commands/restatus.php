<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Hours;
class restatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hours:status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = ' reset hours status everyday';

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
      $hours=Hours::where('status','=','true')->get();
      foreach($hours as $h){
            $h->update(['status'=>'false']);
      }
    }
}
