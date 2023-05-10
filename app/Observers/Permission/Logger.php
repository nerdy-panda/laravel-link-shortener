<?php

namespace App\Observers\Permission;

use App\Contracts\Observers\Permission\Logger as Contract;
use Psr\Log\LoggerInterface as LoggerService;
use Illuminate\Contracts\Translation\Translator ;
use App\Traits\Observers\Permission\Logger as LoggerTrait;
use App\Contracts\Model\Permission ;
class Logger implements Contract
{
    use LoggerTrait;
    protected Translator $translator;
    protected LoggerService $logger;
    public function __construct(LoggerService $logger , Translator $translator)
    {
        $this->logger = $logger ;
        $this->translator = $translator;
    }

    /**
     * Handle the Permission "created" event.
     */
    public function created(Permission $permission): void
    {
        $this->logger->info(
            $this->translator->get(
                'messages.log.store.permission.ok',
                ['id' => $permission->id , 'name' => $permission->name ]
            )
        );
    }

    /**
     * Handle the Permission "updated" event.
     */
    public function updated(Permission $permission): void
    {
        //
    }

    /**
     * Handle the Permission "deleted" event.
     */
    public function deleted(Permission $permission): void
    {
        //
    }
}
