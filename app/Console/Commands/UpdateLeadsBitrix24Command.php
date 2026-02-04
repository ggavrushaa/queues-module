<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use App\Jobs\Bitrix24\UpdateLeadJob;

class UpdateLeadsBitrix24Command extends Command
{
    protected $signature = 'bitrix24:update-leads';

    public function handle()
    {
        $this->warn('Updating leads...');

        $this->updateLeads();

        $this->info('Leads updated.');
    }

    private function updateLeads()
    {
        $users = User::query()->lazyById(1000);

        foreach ($users as $user) {
            dispatch(new UpdateLeadJob($user));
        }
    }
}
