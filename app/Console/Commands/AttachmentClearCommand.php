<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Orchid\Attachment\Models\Attachment;

class AttachmentClearCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:attachment-clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear unused attachments';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $this->line('Deleting unused attachments...');

        $unrelatedAttachments = (new Attachment())->doesntHave('relationships')->get();
        $unrelatedAttachments->each->delete();

        $this->info('Successfully deleted unused file/image attachments');

        return Command::SUCCESS;
    }
}
