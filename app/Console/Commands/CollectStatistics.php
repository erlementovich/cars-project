<?php

namespace App\Console\Commands;

use App\Services\StatisticsCollect;
use Illuminate\Console\Command;

class CollectStatistics extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:statistics';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Сбор статистики с сайта';

    /**
     * Create a new command instance.
     *
     * @return void
     */

    protected $statisticsCollect;

    public function __construct(StatisticsCollect $statisticsCollect)
    {
        parent::__construct();

        $this->statisticsCollect = $statisticsCollect;
    }

    public function handle()
    {
        $this->table($this->statisticsCollect->getHeaders(),
            [$this->statisticsCollect->getStatistics()]);
    }
}
