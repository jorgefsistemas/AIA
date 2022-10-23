<?php

namespace App\Console\Commands;

use App\Repositories\Cancelacion\CancelaciondosRepository;
use App\Repositories\Cancelacion\ICancelaciondosRepository;
use Illuminate\Console\Command;

class TestRepo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'repo';

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
    public function handle(ICancelaciondosRepository $cancelacion)
    {
        dd($cancelacion->getAllUsers());
        return 0;
    }
}
