<?php

namespace StockFlowSite\Console;

use GuzzleHttp\Client;
use DB;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function() {
            //DB::table('cryptos')->where('name', 'EOS')->update(['value_now' => 30]);
            $i = 0;
            $wallet = DB::table('cryptos')->select('cryptos.name')->get();
            $client = new client();
            $allExternalValues = $client->request('GET', 'https://api.coinmarketcap.com/v2/ticker/?sort=rank&structure=array');
            $vals = json_decode($allExternalValues->getBody());
            $vals = $vals->data;
            foreach ($vals as $val) {
                DB::table('cryptos')->where('name', $val->name)->update(['value_now' => $val->quotes->USD->price]);
                $i += 1;
            }
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
