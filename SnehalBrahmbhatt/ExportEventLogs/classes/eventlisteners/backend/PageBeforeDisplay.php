<?php
namespace SnehalBrahmbhatt\ExportEventLogs\Classes\EventListeners\Backend;

use Backend\Classes\Controller;
use BackendMenu;
use System\Controllers\EventLogs;

/**
 * Class PageBeforeDisplay
 * @package SnehalBrahmbhatt\ExportEventLogs\Classes\EventListeners\Backend
 */
class PageBeforeDisplay
{
    /**
     * @param Controller $controller
     * @return void
     */
    public function handle(Controller $controller)
    {
        if ($controller instanceof EventLogs) {
            BackendMenu::setContext('SnehalBrahmbhatt.ExportEventLogs', 'exporteventlogs');
        }
    }
}