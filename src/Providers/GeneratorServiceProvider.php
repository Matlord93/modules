<?php

namespace Matlord\Modules\Providers;

use Illuminate\Support\ServiceProvider;

class GeneratorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the provided services.
     */
    public function boot()
    {
        //
    }

    /**
     * Register the provided services.
     */
    public function register()
    {
        $generators = [
            'command.make.module'            => \Matlord\Modules\Console\Generators\MakeModuleCommand::class,
            'command.make.module.controller' => \Matlord\Modules\Console\Generators\MakeControllerCommand::class,
            'command.make.module.middleware' => \Matlord\Modules\Console\Generators\MakeMiddlewareCommand::class,
            'command.make.module.migration'  => \Matlord\Modules\Console\Generators\MakeMigrationCommand::class,
            'command.make.module.model'      => \Matlord\Modules\Console\Generators\MakeModelCommand::class,
            'command.make.module.policy'     => \Matlord\Modules\Console\Generators\MakePolicyCommand::class,
            'command.make.module.provider'   => \Matlord\Modules\Console\Generators\MakeProviderCommand::class,
            'command.make.module.request'    => \Matlord\Modules\Console\Generators\MakeRequestCommand::class,
            'command.make.module.seeder'     => \Matlord\Modules\Console\Generators\MakeSeederCommand::class,
            'command.make.module.test'       => \Matlord\Modules\Console\Generators\MakeTestCommand::class,
            'command.make.module.job'        => \Matlord\Modules\Console\Generators\MakeJobCommand::class,
        ];

        foreach ($generators as $slug => $class) {
            $this->app->singleton($slug, function ($app) use ($slug, $class) {
                return $app[$class];
            });

            $this->commands($slug);
        }
    }
}
