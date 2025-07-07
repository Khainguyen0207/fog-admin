<?php

namespace Fog\FogAdmin\Console\Commands;

use Fog\FogAdmin\Support\PathHelper;
use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

class BuildAssetsCommand extends Command
{
    protected $signature = 'fog-admin:build-assets';
    protected $description = 'Build frontend assets for FogAdmin package';

    public function handle(): void
    {
        $this->info('Installing and building assets...');

        $process = Process::fromShellCommandline('npm install && npm run build', PathHelper::getRootPath());

        $process->run(function ($type, $buffer) {
            echo $buffer;
        });

        if (!$process->isSuccessful()) {
            $this->error('Build failed.');
            return;
        }

        $this->info('Assets built successfully.');
        return;
    }
}
