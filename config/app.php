<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    */

    'name' => 'WeTyper',

    /*
    |--------------------------------------------------------------------------
    | Application Environment
    |--------------------------------------------------------------------------
    */

    'env' => 'production',

    /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    */

    'debug' => false,

    /*
    |--------------------------------------------------------------------------
    | Application URL
    |--------------------------------------------------------------------------
    */

    'url' => 'http://localhost',

    'asset_url' => null,

    'admin_prefix' => 'admin',

    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    */

    'timezone' => 'UTC',

    /*
    |--------------------------------------------------------------------------
    | Application Locale Configuration
    |--------------------------------------------------------------------------
    */

    'locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Application Fallback Locale
    |--------------------------------------------------------------------------
    */

    'fallback_locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Faker Locale
    |--------------------------------------------------------------------------
    */

    'faker_locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Encryption Key
    |--------------------------------------------------------------------------
    */

    'key' => '',

    'cipher' => 'AES-256-CBC',

    /*
    |--------------------------------------------------------------------------
    | Autoloaded Service Providers
    |--------------------------------------------------------------------------
    */

    'providers' => [
        Illuminate\Bus\BusServiceProvider::class,
        Illuminate\Cache\CacheServiceProvider::class,
        Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
        Illuminate\Cookie\CookieServiceProvider::class,
        Illuminate\Database\DatabaseServiceProvider::class,
        Illuminate\Encryption\EncryptionServiceProvider::class,
        Illuminate\Filesystem\FilesystemServiceProvider::class,
        Illuminate\Foundation\Providers\FoundationServiceProvider::class,
        Illuminate\Hashing\HashServiceProvider::class,
        Illuminate\Mail\MailServiceProvider::class,
        Illuminate\Pagination\PaginationServiceProvider::class,
        Illuminate\Pipeline\PipelineServiceProvider::class,
        Illuminate\Queue\QueueServiceProvider::class,
        Illuminate\Redis\RedisServiceProvider::class,
        Illuminate\Translation\TranslationServiceProvider::class,
        Illuminate\Validation\ValidationServiceProvider::class,
        Illuminate\View\ViewServiceProvider::class,

        WeTyper\Foundation\Http\Provider\RouteServiceProvider::class,

        WeTyper\Album\AlbumServiceProvider::class,
        WeTyper\Article\ArticleServiceProvider::class,
        WeTyper\Category\CategoryServiceProvider::class,
        WeTyper\Issue\IssueServiceProvider::class,
        WeTyper\Member\MemberServiceProvider::class,
        WeTyper\Passport\PassportServiceProvider::class,
        WeTyper\Photo\PhotoServiceProvider::class,
        WeTyper\Plugin\PluginServiceProvider::class,
        WeTyper\Registry\RegistryServiceProvider::class,
        WeTyper\Site\SiteServiceProvider::class,
        WeTyper\Tag\TagServiceProvider::class,
        WeTyper\Theme\ThemeServiceProvider::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Class Aliases
    |--------------------------------------------------------------------------
    */

    'aliases' => [
        'App'          => Illuminate\Support\Facades\App::class,
        'Arr'          => Illuminate\Support\Arr::class,
        'Artisan'      => Illuminate\Support\Facades\Artisan::class,
        'Blade'        => Illuminate\Support\Facades\Blade::class,
        'Broadcast'    => Illuminate\Support\Facades\Broadcast::class,
        'Bus'          => Illuminate\Support\Facades\Bus::class,
        'Cache'        => Illuminate\Support\Facades\Cache::class,
        'Config'       => Illuminate\Support\Facades\Config::class,
        'Cookie'       => Illuminate\Support\Facades\Cookie::class,
        'Crypt'        => Illuminate\Support\Facades\Crypt::class,
        'DB'           => Illuminate\Support\Facades\DB::class,
        'Eloquent'     => Illuminate\Database\Eloquent\Model::class,
        'Event'        => Illuminate\Support\Facades\Event::class,
        'File'         => Illuminate\Support\Facades\File::class,
        'Gate'         => Illuminate\Support\Facades\Gate::class,
        'Hash'         => Illuminate\Support\Facades\Hash::class,
        'Lang'         => Illuminate\Support\Facades\Lang::class,
        'Log'          => Illuminate\Support\Facades\Log::class,
        'Mail'         => Illuminate\Support\Facades\Mail::class,
        'Notification' => Illuminate\Support\Facades\Notification::class,
        'Password'     => Illuminate\Support\Facades\Password::class,
        'Queue'        => Illuminate\Support\Facades\Queue::class,
        'Redirect'     => Illuminate\Support\Facades\Redirect::class,
        'Redis'        => Illuminate\Support\Facades\Redis::class,
        'Request'      => Illuminate\Support\Facades\Request::class,
        'Response'     => Illuminate\Support\Facades\Response::class,
        'Route'        => Illuminate\Support\Facades\Route::class,
        'Schema'       => Illuminate\Support\Facades\Schema::class,
        'Session'      => Illuminate\Support\Facades\Session::class,
        'Storage'      => Illuminate\Support\Facades\Storage::class,
        'Str'          => Illuminate\Support\Str::class,
        'URL'          => Illuminate\Support\Facades\URL::class,
        'Validator'    => Illuminate\Support\Facades\Validator::class,
        'View'         => Illuminate\Support\Facades\View::class,
    ],
];
