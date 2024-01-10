<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class RemoveStorageLink extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'storage:remove-link';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove the public storage link';

    /**
     * Execute the console command.
     */

     public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {

        // if (File::exists(public_path('storage'))) {
        //     // dd(public_path('storage'));
        //     File::delete(public_path('storage/Profile Images/preloader.gif'));

        //     $this->info('Storage File Exits.');
        // } else {
        //     $this->info('Public storage link does not exist.');
        // }

        try {
            $folderPath = public_path('storage');

            if (File::exists($folderPath)) {
                File::deleteDirectory($folderPath);
                echo "Folder and its contents deleted successfully.";
            } else {
                echo "Folder does not exist.";
            }
        } catch (\Exception $e) {
            echo "Error deleting folder: " . $e->getMessage();
        }

    }
}
