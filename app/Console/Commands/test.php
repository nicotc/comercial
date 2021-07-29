<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        Mail::send('emails.html', '', function ($message) {
            $message->from('arreglos@ag10moto.com', 'ag10moto');
            $message->sender('arreglos@ag10moto.com', 'ag10moto');
            $message->to('nicotestagrossa@gmail.com.com', 'John Doe');
            $message->subject('corrio el cron');
        });
        return 0;

    }
}
