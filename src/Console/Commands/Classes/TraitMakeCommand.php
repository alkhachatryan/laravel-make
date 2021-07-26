<?php

namespace Alkhachatryan\LaravelMake\Console\Commands\Classes;
use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Exception\InvalidArgumentException;
use Symfony\Component\Console\Input\InputArgument;

class TraitMakeCommand extends BaseCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'make:trait';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new trait';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Trait';
}
