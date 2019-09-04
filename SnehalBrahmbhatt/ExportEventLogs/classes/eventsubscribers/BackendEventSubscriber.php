<?php
namespace SnehalBrahmbhatt\ExportEventLogs\Classes\EventSubscribers;

use October\Rain\Events\Dispatcher;
use SnehalBrahmbhatt\ExportEventLogs\Classes\Contracts\EventSubscriber;
use SnehalBrahmbhatt\ExportEventLogs\Classes\EventListeners;

/**
 * Class BackendEventSubscriber
 *
 * @package SnehalBrahmbhatt\ExportEventLogs\Classes\EventSubscribers
 */
class BackendEventSubscriber implements EventSubscriber
{
    /**
     * {@inheritdoc}
     */
    public function subscribe(Dispatcher $dispatcher)
    {
        $dispatcher->listen('backend.list.extendColumns', EventListeners\Backend\ListExtendColumns::class);
        $dispatcher->listen('backend.list.injectRowClass', EventListeners\Backend\ListInjectRowClass::class);
        $dispatcher->listen('backend.page.beforeDisplay', EventListeners\Backend\PageBeforeDisplay::class);
    }
}