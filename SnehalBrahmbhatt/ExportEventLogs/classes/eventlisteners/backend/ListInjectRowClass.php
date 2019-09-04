<?php
namespace SnehalBrahmbhatt\ExportEventLogs\Classes\EventListeners\Backend;

use Backend\Widgets\Lists;
use System\Models\EventLog;

/**
 * Class ListInjectRowClass
 *
 * @package SnehalBrahmbhatt\ExportEventLogs\Classes\EventListeners\Backend
 */
class ListInjectRowClass
{
    /**
     * @param Lists $widget
     * @param mixed $record
     * @return string
     */
    public function handle(Lists $widget, $record)
    {
        if ($record instanceof EventLog) {
            switch (strtolower($record->level)) {
                case 'debug':
                    return 'safe';
                case 'info':
                    return 'frozen';
                case 'notice':
                case 'warning':
                    return 'processing';
                case 'error':
                case 'critical':
                case 'alert':
                    return 'negative';
                case 'emergency':
                    return 'important';
            }
        }
    }
}