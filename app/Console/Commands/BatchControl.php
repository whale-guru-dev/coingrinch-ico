<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Batch;
use \Carbon\Carbon;

class BatchControl extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Batch:autocontrol';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Batch Control';

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
        
        // $now = new Carbon(now());
        // $now = Carbon::create(2018,7,17,0,1,0,'America/New_York');//2018-06-08 00:00:00
        $now = Carbon::now('America/new_York');
            
        $last = Carbon::create(2018,7,16,0,0,0,'America/New_York');

        $batchs = Batch::all();
        // $start = new Carbon($batchs[0]->date_from);//2018-06-01 00:00:00
        foreach ($batchs as $batch) {
            $start = new Carbon($batch->date_from); 
            $end   = new Carbon($batch->date_to);
            $end = $end->addDay();
            if($now->gte($start) && $now->lte($end)){
                $batch->status = 2;
                $batch->save();
            }
            if($batch->id - 1 > 0){
                $past_batch = Batch::find($batch->id - 1);
                $past_batch_end = new Carbon($past_batch->date_to);
                if($now->gt($past_batch_end->addDay())){
                    $past_batch->status = 3;
                    $past_batch->save();
                }
            }
        }

        if($now->gt($last)){
            $last_batch = $batchs->where('id' , 6)->first();
            $last_batch->status = 3;
            $last_batch->save();
        }

    }
}
