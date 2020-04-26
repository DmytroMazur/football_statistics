<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Newsletter;
use App\Post;
use Carbon\Carbon;

class SendNewsletter extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'newsletter:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send newsletter';

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
        $emailsSuscriber = Newsletter::all();
        $date = Carbon::now()->subDay()->toDateTimeString();
        
        $posts = Post::where('created_at', '>', $date)->get();
        
        if(count($posts) > 0){
            foreach($posts as $post){
                foreach($emailsSuscriber as $email){
                    /// Send email
                }
            }
        }
    
    }   
}
