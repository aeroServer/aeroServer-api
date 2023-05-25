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
    protected $signature = 'places {commandType} {valueType?}';

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
        //dd($this->argument('valueType'));
        if ($this->argument('commandType') == 'add' && !is_null($this->argument('valueType'))) {
            $place = new Place();
            $place->name = substr($this->argument('valueType'), 0, 16);
            $place->user = 0;
            $place->info = [];
            $place->save();
            $this->info("L'emplacement ".$place->name." a été ajouté.");
        }

        if ($this->argument('commandType') == 'list') {
            $places = Place::all();
            foreach ($places as $place) {
                $this->info($place->id.' : '.$place->name);
            }
        }
    }
}
