<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For detailed instructions you can look the title section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'title'         => 'Estoque de Mudas',
    'title_prefix'  => '',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For detailed instructions you can look the favicon section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_ico_only'     => false,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Google Fonts
    |--------------------------------------------------------------------------
    |
    | Here you can allow or not the use of external google fonts. Disabling the
    | google fonts may be useful if your admin panel internet access is
    | restricted somehow.
    |
    | For detailed instructions you can look the google fonts section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'google_fonts' => [
        'allowed' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For detailed instructions you can look the logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'logo'              => 'Estoque de <b>Mudas</b>',
    'logo_img'          => 'logo.jpeg',
    'logo_img_class'    => 'brand-image elevation-3',
    'logo_img_xl'       => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt'      => 'Estoque de Mudas',

    /*
    |--------------------------------------------------------------------------
    | Preloader Animation
    |--------------------------------------------------------------------------
    |
    | Here you can change the preloader animation configuration.
    |
    | For detailed instructions you can look the preloader section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'preloader' => [
        'enabled' => true,
        'img'     => [
            'path'   => 'logo.jpeg',
            'alt'    => 'Estoque de Muda
            ',
            'effect' => 'animation__shake',
            'width'  => 80,
            'height' => 80,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For detailed instructions you can look the user menu section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'usermenu_enabled'      => true,
    'usermenu_header'       => false,
    'usermenu_header_class' => 'bg-olive',
    'usermenu_image'        => false,
    'usermenu_desc'         => false,
    'usermenu_profile_url'  => false,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For detailed instructions you can look the layout section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'layout_topnav'        => null,
    'layout_boxed'         => null,
    'layout_fixed_sidebar' => true,
    'layout_fixed_navbar'  => true,
    'layout_fixed_footer'  => null,
    'layout_dark_mode'     => false,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For detailed instructions you can look the auth classes section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_auth_card'   => 'card-outline card-olive',
    'classes_auth_header' => '',
    'classes_auth_body'   => '',
    'classes_auth_footer' => '',
    'classes_auth_icon'   => '',
    'classes_auth_btn'    => 'btn-flat btn-olive',

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For detailed instructions you can look the admin panel classes here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_body'             => '',
    'classes_brand'            => '',
    'classes_brand_text'       => '',
    'classes_content_wrapper'  => '',
    'classes_content_header'   => '',
    'classes_content'          => '',
    'classes_sidebar'          => 'sidebar-light-olive elevation-4',
    'classes_sidebar_nav'      => '',
    'classes_topnav'           => 'navbar-white navbar-light',
    'classes_topnav_nav'       => 'navbar-expand',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For detailed instructions you can look the sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'sidebar_mini'                            => 'lg',
    'sidebar_collapse'                        => false,
    'sidebar_collapse_auto_size'              => false,
    'sidebar_collapse_remember'               => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme'                 => 'os-theme-light',
    'sidebar_scrollbar_auto_hide'             => 'l',
    'sidebar_nav_accordion'                   => true,
    'sidebar_nav_animation_speed'             => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For detailed instructions you can look the right sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'right_sidebar'                     => false,
    'right_sidebar_icon'                => 'fas fa-cogs',
    'right_sidebar_theme'               => 'dark',
    'right_sidebar_slide'               => true,
    'right_sidebar_push'                => true,
    'right_sidebar_scrollbar_theme'     => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For detailed instructions you can look the urls section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_route_url'      => false,
    'dashboard_url'      => 'home',
    'logout_url'         => 'logout',
    'login_url'          => 'login',
//    'register_url'       => 'register',
    'register_url'       => false,
//    'password_reset_url' => 'password/reset',
    'password_reset_url' => false,
//    'password_email_url' => 'password/email',
    'password_email_url' => false,
    'profile_url'        => false,

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For detailed instructions you can look the laravel mix section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'enabled_laravel_mix'  => false,
    'laravel_mix_css_path' => 'css/app.css',
    'laravel_mix_js_path'  => 'js/app.js',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'menu' => [
        [ 'header' => 'Menu' ],
        [
            'text'    => 'Grupos',
            'url'     => '#',
            'icon'    => 'fas fa-fw fa-object-group',
            'submenu' => [
                [
                    'text' => 'Listar',
                    'url'  => 'group',
                    'icon' => 'fas fa-fw fa-list',
                ],
                [
                    'text' => 'Cadastrar',
                    'url'  => 'group/create',
                    'icon' => 'fas fa-fw fa-plus',
                ],
            ],
        ],
        [
            'text'    => 'Tamanho',
            'url'     => '#',
            'icon'    => 'fas fa-fw fa-object-ungroup',
            'submenu' => [
                [
                    'text' => 'Listar',
                    'url'  => 'type',
                    'icon' => 'fas fa-fw fa-list',
                ],
                [
                    'text' => 'Cadastrar',
                    'url'  => 'type/create',
                    'icon' => 'fas fa-fw fa-plus',
                ],
            ],
        ],
        [
            'text'    => 'Viveiros',
            'url'     => '#',
            'icon'    => 'fas fa-fw fa-store',
            'submenu' => [
                [
                    'text' => 'Listar',
                    'url'  => 'nursery',
                    'icon' => 'fas fa-fw fa-list',
                ],
                [
                    'text' => 'Cadastrar',
                    'url'  => 'nursery/create',
                    'icon' => 'fas fa-fw fa-plus',
                ],
            ],
        ],
        [
            'text'    => 'Espécies',
            'url'     => '#',
            'icon'    => 'fas fa-fw fa-seedling',
            'submenu' => [
                [
                    'text' => 'Listar',
                    'url'  => 'specie',
                    'icon' => 'fas fa-fw fa-list',
                ],
                [
                    'text' => 'Cadastrar',
                    'url'  => 'specie/create',
                    'icon' => 'fas fa-fw fa-plus',
                ],
            ],
        ],
        [
            'text'    => 'Inventário',
            'url'     => '#',
            'icon'    => 'fas fa-fw fa-dolly-flatbed',
            'submenu' => [
                [
                    'text' => 'Listar',
                    'url'  => 'inventory',
                    'icon' => 'fas fa-fw fa-list',
                ],
                [
                    'text' => 'Cadastrar',
                    'url'  => 'inventory/create',
                    'icon' => 'fas fa-fw fa-plus',
                ],
            ],
        ],
        [
            'text'    => 'Usuários',
            'url'     => '#',
            'icon'    => 'fas fa-fw fa-user',
            'submenu' => [
                [
                    'text' => 'Listar',
                    'url'  => 'user',
                    'icon' => 'fas fa-fw fa-list',
                ],
                [
                    'text' => 'Cadastrar',
                    'url'  => 'user/create',
                    'icon' => 'fas fa-fw fa-plus',
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For detailed instructions you can look the menu filters section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For detailed instructions you can look the plugins section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Plugins-Configuration
    |
    */

    'plugins' => [
        'Datatables'     => [
            'active' => true,
            'files'  => [
                [
                    'type'     => 'js',
                    'asset'    => false,
                    'location' => '//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js',
                ],
                [
                    'type'     => 'js',
                    'asset'    => false,
                    'location' => '//cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type'     => 'js',
                    'asset'    => false,
                    'location' => '//cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js',
                ],
                [
                    'type'     => 'js',
                    'asset'    => false,
                    'location' => '//cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js',
                ],
                [
                    'type'     => 'css',
                    'asset'    => false,
                    'location' => '//cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css',
                ],
                [
                    'type'     => 'css',
                    'asset'    => false,
                    'location' => '//cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css',
                ],
                [
                    'type'     => 'js',
                    'asset'    => false,
                    'location' => '//cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js',
                ],
                [
                    'type'     => 'js',
                    'asset'    => false,
                    'location' => '//cdn.datatables.net/buttons/1.6.5/js/buttons.bootstrap4.min.js',
                ],
                [
                    'type'     => 'css',
                    'asset'    => false,
                    'location' => '//cdn.datatables.net/buttons/1.6.5/css/buttons.bootstrap4.min.css',
                ],
                [
                    'type'     => 'js',
                    'asset'    => false,
                    'location' => '//cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js',
                ],
                [
                    'type'     => 'js',
                    'asset'    => false,
                    'location' => '//cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js',
                ],
                [
                    'type'     => 'js',
                    'asset'    => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js',
                ],
                [
                    'type'     => 'js',
                    'asset'    => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js',
                ],
                [
                    'type'     => 'js',
                    'asset'    => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js',
                ],
                [
                    'type'     => 'js',
                    'asset'    => false,
                    'location' => '//cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js',
                ],
            ],
        ],
        'Select2'        => [
            'active' => true,
            'files'  => [
                [
                    'type'     => 'js',
                    'asset'    => false,
                    'location' => '//cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
                ],
                [
                    'type'     => 'css',
                    'asset'    => false,
                    'location' => '//cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css',
                ],
            ],
        ],
        'Chartjs'        => [
            'active' => true,
            'files'  => [
                [
                    'type'     => 'js',
                    'asset'    => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        'Sweetalert2'    => [
            'active' => true,
            'files'  => [
                [
                    'type'     => 'js',
                    'asset'    => false,
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@8',
                ],
            ],
        ],
        'Pace'           => [
            'active' => false,
            'files'  => [
                [
                    'type'     => 'css',
                    'asset'    => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type'     => 'js',
                    'asset'    => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
        'Mask'           => [
            'active' => true,
            'files'  => [
                [
                    'type'     => 'js',
                    'asset'    => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js',
                ],
            ],
        ],
        'Validation'     => [
            'active' => true,
            'files'  => [
                [
                    'type'     => 'js',
                    'asset'    => true,
                    'location' => 'vendor/jquery-validation/jquery.validate.js',
                ],
            ],
        ],
        'Custom'         => [
            'active' => true,
            'files'  => [
                [
                    'type'     => 'css',
                    'asset'    => true,
                    'location' => 'vendor/css/app.css',
                ],
                [
                    'type'     => 'js',
                    'asset'    => true,
                    'location' => 'vendor/js/app.js',
                ],
            ],
        ],
        'datetimepicker' => [
            'active' => true,
            'files'  => [
                [
                    'type'     => 'js',
                    'asset'    => true,
                    'location' => 'vendor/moment/moment-with-locales.js',
                ],
                [
                    'type'     => 'css',
                    'asset'    => true,
                    'location' => 'vendor/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css',
                ],
                [
                    'type'     => 'js',
                    'asset'    => true,
                    'location' => 'vendor/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js',
                ],
            ],
        ],
        'ionicons'       => [
            'active' => true,
            'files'  => [
                [
                    'type'     => 'css',
                    'asset'    => false,
                    'location' => 'http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css',
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | IFrame
    |--------------------------------------------------------------------------
    |
    | Here we change the IFrame mode configuration. Note these changes will
    | only apply to the view that extends and enable the IFrame mode.
    |
    | For detailed instructions you can look the iframe mode section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/IFrame-Mode-Configuration
    |
    */

    'iframe' => [
        'default_tab' => [
            'url'   => null,
            'title' => null,
        ],
        'buttons'     => [
            'close'           => true,
            'close_all'       => true,
            'close_all_other' => true,
            'scroll_left'     => true,
            'scroll_right'    => true,
            'fullscreen'      => true,
        ],
        'options'     => [
            'loading_screen'    => 1000,
            'auto_show_new_tab' => true,
            'use_navbar_items'  => true,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Livewire support.
    |
    | For detailed instructions you can look the livewire here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'livewire' => false,
];
