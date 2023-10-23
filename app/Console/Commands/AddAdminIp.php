<?php

namespace App\Console\Commands;

use App\Models\AdminIP;
use Illuminate\Console\Command;

class AddAdminIp extends Command
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
    protected $description = 'Allow IP to access to admin page';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $ip_ask = $this->ask("What is the IPv4 address ?");

        $admin_ip = AdminIP::create([ 'ip' => $ip_ask ]);
        $admin_ip->save();

        $this->info("IP has been successfully added to database");
    }
}
