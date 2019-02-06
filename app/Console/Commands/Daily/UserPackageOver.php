<?php

namespace App\Console\Commands\Daily;

use App\Models\CurrentPackage;
use Carbon\Carbon;
use Illuminate\Console\Command;

class UserPackageOver extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:packageover';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'User package has expired.';

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
     * @return mixed
     */
    public function handle()
    {

        CurrentPackage::where('package_end_date', '<', Carbon::today()->toDateString())
            ->update(
                [
                    'package_active_days' => 0,
                    'top_in_search' => 0,
                    'post_photo' => 0,
                    'direct_contact_information' => 0,
                    'privacy_set' => 0,
                    'send_message' => 0,
                    'daily_message' => 0,
                    'total_interest_express' => 0,
                    'daily_interest_express' => 0,
                    'interest_approve' => 0,
                    'total_interest_approve' => 0,
                    'daily_interest_approve' => 0,
                    'send_profile' => 0,
                    'add_favorite' => 0,
                    'most_favorite' => 0,
                    'block_profile' => 0,
                    'counselling' => 0,
                ]);

    }
}
