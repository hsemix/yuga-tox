<?php

namespace Tox\Console;

use Yuga\Console\Command;
use Yuga\Support\FileSystem;

class PublishCommand extends Command
{
    protected $name = 'tox:publish';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish All publishable Assets';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->comment('Moving files');
        FileSystem::copy(__DIR__.'/../resources/views/tox/', path('resources/views/tox/'));
        $this->info('Successfully published assets');
    }
    
}
