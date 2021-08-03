<?php
return [
    /**
     * Url path to use for this package routes
     */
    'url_path' => '/form-builder',

    /**
     * Template layout file. This is the path to the layout file your application uses
     */
    'layout_file' => 'layouts.app',

    /**
     * The stack section in the layout file to output js content
     * Define something like @stack('stack_name') and provide the 'stack_name here'
     */
    'layout_js_stack' => 'scripts',

    /**
     * The stack section in the layout file to output css content
     */
    'layout_css_stack' => 'styles',

    /**
     * The class that will provide the roles we will display on form create or edit pages?
     */
    'roles_provider' => doode\FormBuilder\Services\RolesProvider::class,

    /**
     * Models used in form builder
     */
    'models' => [
        'user' => \App\Models\User::class,
    ],
];
