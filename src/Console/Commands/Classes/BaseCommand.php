<?php

namespace Alkhachatryan\LaravelMake\Console\Commands\Classes;
use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Exception\InvalidArgumentException;
use Symfony\Component\Console\Input\InputArgument;

abstract class BaseCommand extends GeneratorCommand
{
    /**
     * The name of class being generated.
     *
     * @var string
     */
    protected $class;

    /**
     * Execute the console command.
     *
     * @throws
     * @return bool|null
     */
    public function fire(): ?bool
    {
        $this->setClass();

        $path = $this->getPath($this->class);

        if ($this->alreadyExists($this->getNameInput())) {
            $this->error('File already exists!');

            return false;
        }

        $this->makeDirectory($path);

        $this->files->put($path, $this->buildClass($this->class));

        $this->info($this->type.' created successfully.');

        $this->line("<info>Created ".$this->type." :</info> $this->class");
    }

    /**
     * Set repository class name
     *
     * @return BaseCommand
     */
    private function setClass(): BaseCommand
    {
        $this->class = ucwords(strtolower($this->argument('name')));

        return $this;
    }

    /**
     * Replace the class name for the given stub.
     *
     * @param  string  $stub
     * @param  string  $name
     * @return string
     */
    protected function replaceClass($stub, $name): string
    {
        if(!$this->argument('name')){
            throw new InvalidArgumentException("Missing required argument model name");
        }

        $stub = parent::replaceClass($stub, $name);

        $class = $this->class;

        if(! $class){
            $namespace = explode('/', $this->argument('name'));
            $class = end($namespace);
        }

        return str_replace('Dummy'.$this->type, $class, $stub);
    }

    /**
     *
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub(): string
    {
        return  __DIR__.'/../../../../stubs/'.$this->type.'.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace . '\Classes';
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments(): array
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the model class.'],
        ];
    }
}
