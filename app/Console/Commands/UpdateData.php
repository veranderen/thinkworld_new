<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Library\DataCollection;

class UpdateData extends Command
{
    protected $dataCollection;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'updateData';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update app data';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(DataCollection $dataCollection)
    {
        parent::__construct();
        $this->dataCollection = $dataCollection;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        $this->dataCollection->save();
    }
}
