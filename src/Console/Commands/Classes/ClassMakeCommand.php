<?php

namespace Alkhachatryan\LaravelMake\Console\Commands\Classes;
use Illuminate\Console\Command;
use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Exception\InvalidArgumentException;
use Symfony\Component\Console\Input\InputArgument;

class ClassMakeCommand extends BaseCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'make:class';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Class';
}
