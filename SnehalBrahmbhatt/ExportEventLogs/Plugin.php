<?php
namespace SnehalBrahmbhatt\ExportEventLogs;

use Backend;
use Event;
use System\Classes\PluginBase;
use System\Controllers\EventLogs;
use SnehalBrahmbhatt\ExportEventLogs\Classes\EventSubscribers\BackendEventSubscriber;

/** @noinspection PhpMissingParentCallCommonInspection */

/**
 * Class Plugin
 *
 * EventLogs Plugin Information File.
 *
 * @package SnehalBrahmbhatt\ExportEventLogs
 */
class Plugin extends PluginBase
{
    /**
     * {@inheritdoc}
     */
    public function pluginDetails(): array
    {
        return [
            'name' => 'Export Event Logs',
            'description' => 'October CMS plugin which improves the event logs view & export feature',
            'author' => 'Snehal Brahmbhatt',
            'icon' => 'icon-leaf',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function boot()
    {
        Event::subscribe(BackendEventSubscriber::class);

        EventLogs::extend(function (EventLogs $controller) {
            $controller->listConfig = '$/SnehalBrahmbhatt/ExportEventLogs/controllers/eventlogs/config_list.yaml';
        });
    }

    /**
     * {@inheritdoc}
     */
    public function registerNavigation(): array
    {
        return [
            'exporteventlogs' => [
                'label' => 'system::lang.event_log.menu_label',
                'iconSvg' => '/plugins/SnehalBrahmbhatt/ExportEventLogs/assets/images/icon.svg',
                'url' => Backend::url('system/exporteventlogs'),
                'order' => 202,
                'permissions' => [
                    'system.access_logs',
                ],
            ]
        ];
    }
}
