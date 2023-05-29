<?php

namespace App\Providers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use Symfony\Component\Process\Process;

class GitVersionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        view()->share('appGitVersion', function () {
                $process = Process::fromShellCommandline(
                    'git describe --tags --abbrev=0',
                    $this->app->basePath()
                );

                $process->run();

                return trim($process->getOutput()) ?: 'unreleased';
            });
    }
}
