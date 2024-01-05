<?php

namespace App\Console\Commands;

use App\Models\AdminIP;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;

class ManageAdminIP extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:admin-ip {action=add}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Authorize an IP address';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        return match ($this->argument('action')) {
            'add' => $this->addIP(),
            'remove' => $this->removeIP()
        };
    }

    /**
     * Add an IP address to the database
     *
     * @return int
     */
    private function addIP(): int
    {
        $ip = $this->ask('Please enter an IP address');

        $validator = Validator::make(compact('ip'), [
            'ip' => ['required', 'ip'],
        ]);

        if ($validator->fails()) {
            $this->error('This is not an IP address, please try again');

            return Command::FAILURE;
        }

        AdminIP::create(['ip_address' => $ip]);

        $this->info("IP address {$ip} has been added to the database");

        return Command::SUCCESS;
    }

    /**
     * Remove an IP address to the database
     * @return int
     */
    private function removeIP(): int
    {
        $ip = $this->ask('Please enter an IP address');

        $validator = Validator::make(compact('ip'), [
            'ip' => ['required', 'ip'],
        ]);

        if ($validator->fails()) {
            $this->error('This is not an IP address, please try again');

            return Command::FAILURE;
        }

        AdminIP::where('ip_address', '=', $ip)->delete();

        $this->info("IP address {$ip} has been deleted from the database");

        return Command::SUCCESS;
    }
}
