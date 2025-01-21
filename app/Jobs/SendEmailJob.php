<?php

namespace App\Jobs;

use App\Mail\SendWelcomeEmail;
use App\Models\EmailRecord;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmailJob implements ShouldQueue
{
    use Queueable, InteractsWithQueue, SerializesModels;

    public function __construct()
    {

    }

    public function handle()
    {
        $record = EmailRecord::where('email_sent',false)->first();
        if($record){
            try {
                Mail::to($record->email)->send(new SendWelcomeEmail($record));
                $record->update([
                    'email_sent' => true,
                    'sent_at' => now(),
                    'attempts' => $record->attempts + 1,
                ]);
            } catch (\Exception $e) {
                $record->increment('attempts');
                \Log::error('Failed to send email to ' . $record->email . ': ' . $e->getMessage());
            }
        }

    }
}
