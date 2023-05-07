<?php

namespace App\Http\Responses\Permission\Store;

use App\Services\ResponseBuilder;
use Symfony\Component\HttpFoundation\Response;
use \App\Contracts\Responses\Permission\Store\StoreBuilder as Contract;
class StoreBuilder extends ResponseBuilder implements Contract
{
    public function build(string $permission , string $okMessage): Response
    {
        return $this->response->redirectToRoute('dashboard.home')
                    ->with('system.messages.ok', [$okMessage]);
    }
}
