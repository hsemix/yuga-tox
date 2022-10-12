<?php

namespace Tox\Console;

use Yuga\Console\Command;

class PublishCommand extends Command
{
    protected $name = 'tox:publish';
    
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Public All Assets';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->info('Public All Assets.');
    }
    
}