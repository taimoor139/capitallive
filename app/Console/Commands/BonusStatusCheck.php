<?php

namespace App\Console\Commands;

use App\Models\Bonus;
use Illuminate\Console\Command;

class BonusStatusCheck extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bonus_status:check';

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
        $bonuses = Bonus::query()->where('status', 0)->get();
        foreach ($bonuses as $bonus){
            if(((int) now()->format('d') - (int) date_format($bonus->created_at, 'd')) - 6 == 0){
                $update = Bonus::query()->where('id', $bonus->id)->update([
                    'status' => 1
                ]);
            }
        }
    }
}
