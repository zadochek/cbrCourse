<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use CBR\CurrencyDaily;

class CurrencyCoursesOfTheDay extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'courses:day';

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
        try {
            $handler = new CurrencyDaily();
            $result = $handler
                ->setCodes(['USD','EUR'])
                ->request() 
                ->getResult();

            foreach($result as $currency) {

                DB::table('currency_courses')->updateOrInsert([
                    'code' => $currency['CharCode'],
                    'value' => $currency['Value'],
                ]); 
            };

        Log::channel('api_log')->info('received from api USD: ' . $result['USD']['Value'] . ' EUR: ' . $result['EUR']['Value']);
    
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
