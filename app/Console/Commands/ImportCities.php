<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ImportCities extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:cities';

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
        try{
            $cities = database_path().'/cities.sql';
            \DB::unprepared(file_get_contents($cities));
            echo 'Migrated';
        }catch(\Throwable $th){
            echo $th;
        }

    }
}
