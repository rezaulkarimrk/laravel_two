<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class generateuser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:user {count}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate some users on users table';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $user = $this->argument('count');
        for($i=0; $i<$user; $i++){
            User::factory()->create();
        }
    }
}
