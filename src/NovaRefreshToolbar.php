<?php

namespace Curder\NovaRefreshToolbar;

use Illuminate\Database\Eloquent\Model;
use Laravel\Nova\Nova;
use Laravel\Nova\Resource;
use Laravel\Nova\Tool;

class NovaRefreshToolbar extends Tool
{
    public static $excludeResources = [];
    public static $includeResources = [];

    /**
     * Perform any tasks that need to happen when the tool is booted.
     *
     * @return void
     */
    public function boot()
    {
        Nova::script('nova-refresh-toolbar', __DIR__ . '/../dist/js/tool.js');
        // Nova::style('nova-refresh-toolbar', __DIR__ . '/../dist/css/tool.css');

        $allResources = collect(Nova::availableResources(request()))->filter(function ($resource) {
            return isset($resource::$indexRefreshToolBar) ? $resource::$indexRefreshToolBar : true;
        })->map(function ($resource) {
            return $resource::uriKey();
        })->values();

        Nova::provideToScript(["customIndexRefreshToolbar" => $allResources]);
    }

    /**
     * Build the view that renders the navigation links for the tool.
     *
     * @return \Illuminate\View\View
     */
    public function renderNavigation()
    {
        return '';
    }
}
