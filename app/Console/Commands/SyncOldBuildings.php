<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\Building;

class SyncOldBuildings extends Command
{
    protected $signature = 'app:sync-old-buildings';

    protected $description = 'Sync buildings from old database';

    public function handle()
    {
        $buildings = DB::connection('old_mysql')
            ->table('gedung')
            ->select(
                'id_gedung',
                'gedung'
            )
            ->orderBy('id_gedung')
            ->get();

        foreach ($buildings as $building) {
            Building::updateOrCreate(
                ['code' => $building->gedung],
                ['name' => 'Gedung ' . $building->gedung]
            );

            $this->info(
                'Synced: Gedung ' . $building->gedung
            );
        }

        return Command::SUCCESS;
    }
}