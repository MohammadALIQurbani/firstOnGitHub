<?php

namespace App\Jobs;


use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class InfromEmployeerJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data=[];
    public $emailData=[];
    /**
     * Create a new job instance.
     *
     * @return void
     */

    public function __construct($data, $emailData)
    {
        $this->data=$data;
        $this->emailData= $emailData;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // foreach ($request->email as $key => $value) {
        //     dd($value);
        // }
        foreach ($this->emailData as $key => $email) {
            Mail::to($email)->send(new SendMail());
          
        }
    }
}
