<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things cleaner and simpler.
     */
    public $aliases = [
        'csrf'     => \CodeIgniter\Filters\CSRF::class,          // CSRF Protection
        'debug'    => \CodeIgniter\Filters\DebugToolbar::class,  // Debug Toolbar
        'honeypot' => \CodeIgniter\Filters\Honeypot::class,      // Honeypot Filter
        'authfilter'     => \App\Filters\AuthFilter::class,         // Uncomment to add authentication filter
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     */
    public $globals = [
        'before' => [
            // You can uncomment this line if you want CSRF protection globally
            // 'csrf', 
        ],
        'after' => [
            'debug',  // This will enable the Debug Toolbar for all responses
        ],
    ];

    /**
     * List of filter aliases that work on a
     * particular HTTP method (GET, POST, etc.).
     */
    public $methods = [
        // Add method-specific filters here if needed
        // e.g., 'POST' => ['honeypot'] or 'GET' => ['csrf']
    ];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     */
    public $filters = [
        // Example route protection with AuthFilter
        // 'auth' => [
        //     'before' => [
        //         'dashboard/*',  // All routes under 'dashboard/' will require authentication
        //         'dashboard',    // The 'dashboard' route itself will also require authentication
        //     ],
        // ],
    ];
}
