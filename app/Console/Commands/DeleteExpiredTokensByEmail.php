<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class DeleteExpiredTokensByEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // protected $signature = 'command:name';
    protected $signature = 'tokens:delete-expired';

    /**
     * The console command description.
     *
     * @var string
     */
    // protected $description = 'Command description';
    protected $description = 'Delete expired tokens based on associated email addresses';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        return 0;
        // $expiredTokens = DB::table('admins_password_resets')
        //     ->where('created_at', '<=', Carbon::now()->subHour())
        //     ->pluck('email');

        // DB::table('users')->whereIn('email', $expiredTokens)->delete();

        // $this->info('Expired tokens deleted successfully.');
    }
}
