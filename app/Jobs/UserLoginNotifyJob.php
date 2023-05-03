<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Contracts\UserableContract as User;
use App\Contracts\UserLoginNotificationContract as UserLoginNotification;

class UserLoginNotifyJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $deleteWhenMissingModels = true;
    protected User $user;
    protected string $ip;
    /**
     * Create a new job instance.
     */
    public function __construct(User $user , string $ip)
    {
        $this->user = $user;
        $this->ip = $ip;
    }

    /**
     * Execute the job.
     */
    public function handle(UserLoginNotification $notification): void
    {
        $notification->setIp($this->ip);
        $this->user->notify($notification);
    }

}
