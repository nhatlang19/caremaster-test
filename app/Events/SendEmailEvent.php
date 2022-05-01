<?php

namespace App\Events;

use App\Models\Company;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SendEmailEvent 
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    protected Company $company;
    
    public function __construct(Company $company)
    {
        $this->company = $company;
    }

    public function company()
    {
        return $this->company;
    }
}
