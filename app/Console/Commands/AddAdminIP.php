<?php

namespace App\Console\Commands;

use App\Models\AdminIP;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;

class AddAdminIP extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:add-admin-ip';

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
        $ip = $this->ask('Please enter an IP address : ');

        $validator = Validator::make(compact('ip'), [
            'ip' => ['required', 'ip'],
        ]);

        if ($validator->fails()) {
            $this->error('This is not an IP address, please try again');

            return Command::FAILURE;
        }

        AdminIP::create(['ip_address' => $ip]);

        return Command::SUCCESS;
    }
}
