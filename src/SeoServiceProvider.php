<?php

namespace AllYouNeed\Seo;

use AllYouNeed\Seo\Events\Seo;

// Facades
use Illuminate\Support\Facades\Event;
use Statamic\Facades\CP\Nav;
use Statamic\Facades\Permission;

// Providers
use Statamic\Providers\AddonServiceProvider;

/**
 * Class ServiceProvider
 *
 * @package  AltDesign\AltSeo
 * @author   Ben Harvey <ben@alt-design.net>, Natalie Higgins <natalie@alt-design.net>
 * @license  Copyright (C) Alt Design Limited - All Rights Reserved - licensed under the MIT license
 * @link     https://alt-design.net
 */
class SeoServiceProvider extends AddonServiceProvider
{
    /**
     * @var string - Sets the namespace of the addon
     */
    protected $viewNamespace = 'seo';

    /**
     * @var string[] - Bring in the tags for use
     */
    protected $tags = [
        \AllYouNeed\Seo\Tags\Seo::class,
    ];

    /**
     * @var string[] - Register our routes (mainly for settings tbh).
     */
    protected $routes = [
        'cp' => __DIR__.'/../routes/cp.php',
    ];

    /**
     * Pull the option into the CP Nav.
     */
    public function addToNav()
    {
        Nav::extend(function ($nav) {
            $nav->content('All SEO you need')
                ->section('Tools')
                ->can('view SEO')
                ->route('seo.index')
                ->icon('<svg fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 55 55" xml:space="preserve"><path d="M5.865,34.72c-1.906,0-3.754-0.614-4.957-1.231L0,37.184c1.114,0.616,3.344,1.202,5.602,1.202 c5.426,0,7.977-2.815,7.977-6.129c0-2.786-1.643-4.604-5.132-5.895c-2.552-0.969-3.666-1.525-3.666-2.786 c0-1.027,0.938-1.907,2.874-1.907s3.344,0.558,4.135,0.939l0.998-3.607c-1.174-0.528-2.816-0.997-5.045-0.997 c-4.663,0-7.479,2.58-7.479,5.953c0,2.874,2.141,4.692,5.426,5.836c2.375,0.851,3.314,1.555,3.314,2.785 C9.004,33.87,7.918,34.72,5.865,34.72zM29.211,38.1v-3.65h-8.1v-4.7h7.25v-3.6h-7.25v-4.15h7.75v-3.6h-12.25v19.65zM35,36.5 a11.5 11.5 30 1 1 3,2l-6,8a1 1 30 0 1 -3,-2l-6,8Zm13.5 -14a8 8 30 1 0 .01,.01"/></svg>');
        });
    }

    /**
     * Register our permissions, so we can control who can see the settings.
     *
     * @return void
     */
    public function registerPermissions()
    {
        Permission::register('view SEO')
                  ->label('View SEO Settings');
    }

    /**
     * Register our events.
     *
     * @return void
     */
    public function registerEvents()
    {
        Event::subscribe(Seo::class);
    }

    /**
     * Load our views.
     *
     * @return void
     */
    protected function loadViews()
    {
        $this->loadViewsFrom(__DIR__.'/resources/views', 'seo');
    }

    /**
     * Statamic boot method.
     *
     * @return void
     */
    public function bootAddon()
    {
        $this->loadViews();
        $this->addToNav();
        $this->registerPermissions();
        $this->registerEvents();
    }
}


