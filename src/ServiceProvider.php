<?php

namespace Alkhachatryan\LaravelMake;

use Alkhachatryan\LaravelMake\Console\Commands\Classes\ClassMakeCommand;
use Alkhachatryan\LaravelMake\Console\Commands\Classes\InterfaceMakeCommand;
use Alkhachatryan\LaravelMake\Console\Commands\Classes\TraitMakeCommand;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    protected $commands = [
        InterfaceMakeCommand::class,
        TraitMakeCommand::class,
        ClassMakeCommand::class,
    ];

    public function register(){
        $this->commands($this->commands);
    }
}
