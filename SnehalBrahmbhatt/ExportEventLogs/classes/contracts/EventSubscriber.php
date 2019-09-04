<?php
namespace SnehalBrahmbhatt\ExportEventLogs\Classes\Contracts;

use October\Rain\Events\Dispatcher;

/**
 * Interface EventSubscriber
 *
 * @package SnehalBrahmbhatt\ExportEventLogs\Classes\Contracts
 */
interface EventSubscriber
{
    /**
     * @param Dispatcher $dispatcher
     */
    public function subscribe(Dispatcher $dispatcher);
}
