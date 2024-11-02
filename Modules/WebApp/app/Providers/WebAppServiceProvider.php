<?php

namespace Modules\WebApp\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Nwidart\Modules\Traits\PathNamespace;
use TallStackUi\Facades\TallStackUi;

class WebAppServiceProvider extends ServiceProvider
{
    use PathNamespace;

    protected string $name = 'WebApp';

    protected string $nameLower = 'webapp';

    /**
     * Boot the application events.
     */
    public function boot(): void
    {
        $this->registerCommands();
        $this->registerCommandSchedules();
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->loadMigrationsFrom(module_path($this->name, 'database/migrations'));

        Blade::componentNamespace('Modules\\WebApp\\View\\Components', 'bg:ui');

        Blade::directive('bgSvg', function ($arguments) {
            // Funky madness to accept multiple arguments into the directive
            [$path, $class] = array_pad(explode(',', trim($arguments, '() ')), 2, '');
            $path = trim($path, "' ");
            $class = trim($class, "' ");

            // Create the dom document as per the other answers
            $svg = new \DOMDocument;
            $svg->load(resource_path('svg/'.$path));
            $svg->documentElement->setAttribute('class', $class);
            $output = $svg->saveXML($svg->documentElement);

            return $output;
        });

        $this->tallStackUiCustomize();
    }

    /**
     * Register commands in the format of Command::class
     */
    protected function registerCommands(): void
    {
        // $this->commands([]);
    }

    /**
     * Register command Schedules.
     */
    protected function registerCommandSchedules(): void
    {
        // $this->app->booted(function () {
        //     $schedule = $this->app->make(Schedule::class);
        //     $schedule->command('inspire')->hourly();
        // });
    }

    /**
     * Register translations.
     */
    public function registerTranslations(): void
    {
        $langPath = resource_path('lang/modules/'.$this->nameLower);

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, $this->nameLower);
            $this->loadJsonTranslationsFrom($langPath);
        } else {
            $this->loadTranslationsFrom(module_path($this->name, 'lang'), $this->nameLower);
            $this->loadJsonTranslationsFrom(module_path($this->name, 'lang'));
        }
    }

    /**
     * Register config.
     */
    protected function registerConfig(): void
    {
        $this->publishes([module_path($this->name, 'config/config.php') => config_path($this->nameLower.'.php')], 'config');
        $this->mergeConfigFrom(module_path($this->name, 'config/config.php'), $this->nameLower);
    }

    /**
     * Register views.
     */
    public function registerViews(): void
    {
        $viewPath = resource_path('views/modules/'.$this->nameLower);
        $sourcePath = module_path($this->name, 'resources/views');

        $this->publishes([$sourcePath => $viewPath], ['views', $this->nameLower.'-module-views']);

        $this->loadViewsFrom(array_merge($this->getPublishableViewPaths(), [$sourcePath]), $this->nameLower);

        $componentNamespace = $this->module_namespace($this->name, $this->app_path(config('modules.paths.generator.component-class.path')));

        Blade::componentNamespace($componentNamespace, $this->nameLower);
    }

    private function getPublishableViewPaths(): array
    {
        $paths = [];
        foreach (config('view.paths') as $path) {
            if (is_dir($path.'/modules/'.$this->nameLower)) {
                $paths[] = $path.'/modules/'.$this->nameLower;
            }
        }

        return $paths;
    }

    public function tallStackUiCustomize(): void
    {
        TallStackUi::personalize()
            ->button('button')
            ->block('wrapper.class')
            ->append('!rounded transform font-medium')
            ->replace('transition-all', 'transition')
            ->replace('duration-200', 'duration-500')
            ->remove(['focus:ring-2', 'focus:border-transparent', 'focus:ring-offset-white', 'focus:shadow-outline'])
            ->block('wrapper.sizes.md')
            ->replace('text-md', 'text-base')
            ->block('wrapper.sizes.lg')
            ->replace('py-3', 'py-2')
            ->and
            ->button('circle')
            ->block('wrapper.base')
            ->remove(['focus:ring-offset-white', 'focus:shadow-outline', 'focus:ring-2'])
            ->replace('transition-all', 'transition')
            ->replace('duration-200', 'duration-500')
            ->and
            ->link()
            ->block('sizes.md')
            ->remove('text-md')
            ->append('!inline hover:text-primary-600')
            ->and
            ->card()
            ->block('wrapper.second')
            ->append('!bg-opacity-30 backdrop-filter backdrop-blur-lg')
            ->block('header.wrapper')
            ->replace('p-4', 'px-8 py-4')
            ->block('body')
            ->block('header.text', 'w-full')
            ->and
            ->alert()
            ->block('wrapper')
            ->replace('rounded-lg', 'rounded')
            ->append('mb-4 border border-solid')
            ->block('close.wrapper')
            ->replace('items-start', 'items-center')
            ->block('text.description')
            ->replace('text-sm', 'text-base')
            ->and
            ->modal()
            ->block('title.text')
            ->replace('text-md', 'text-base')
            ->block('wrapper.fourth')
            ->replace('rounded-xl', 'rounded')
            ->and
            ->badge()
            ->block('wrapper.class')
            ->replace('font-bold', 'font-medium');
    }

    /**
     * Register the service provider.
     */
    public function register(): void
    {
        $this->app->register(EventServiceProvider::class);
        $this->app->register(RouteServiceProvider::class);
    }

    /**
     * Get the services provided by the provider.
     */
    public function provides(): array
    {
        return [];
    }
}
