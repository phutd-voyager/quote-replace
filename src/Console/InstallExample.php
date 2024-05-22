<?php

namespace VoyagerInc\QuoteReplace\Console;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class InstallExample extends Command
{
    protected $signature = 'quote-replace:install-example';

    protected $description = 'Install example QuoteReplaceController';

    public function handle()
    {
        $this->info('Installing example...');

        // Controllers
        (new Filesystem)->ensureDirectoryExists(app_path('Http/Controllers'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../stubs/app/Controllers', app_path('Http/Controllers'));

        // Requests
        (new Filesystem)->ensureDirectoryExists(app_path('Http/Requests'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../stubs/app/Requests', app_path('Http/Requests'));

        // Views
        (new Filesystem)->ensureDirectoryExists(resource_path('views'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../stubs/resources/views', resource_path('views'));

        // Routes
        copy(__DIR__ . '/../../stubs/routes/quote_replace.php', base_path('routes/quote_replace.php'));

        $this->line('');
        $this->components->info('Package scaffolding installed successfully.');
    }
}
