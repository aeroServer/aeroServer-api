<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Place;

class places extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'places {command} {?value}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        if ($this->arguments('command') == 'add' && isset($this->arguments('value'))) {
            $place = new Place();
            $place->name = substr($this->arguments('value'), 0, 16);
            $place->user = 0;
            $place->save();
            $this->info("L'emplacement ".$place->name." a été ajouté.");
        }
    }
}
