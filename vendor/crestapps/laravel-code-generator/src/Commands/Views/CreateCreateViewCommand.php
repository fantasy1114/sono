<?php

namespace CrestApps\CodeGenerator\Commands\Views;

use CrestApps\CodeGenerator\Commands\Bases\ViewsCommandBase;
use CrestApps\CodeGenerator\Models\Resource;
use CrestApps\CodeGenerator\Support\Str;

class CreateCreateViewCommand extends ViewsCommandBase
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:create-view
                            {model-name : The model name that this view will represent.}
                            {--resource-file= : The name of the resource-file to import from.}
                            {--views-directory= : The name of the directory to create the views under.}
                            {--routes-prefix=default-form : Prefix of the route group.}
                            {--language-filename= : The name of the language file.}
                            {--layout-name=layouts.app : This will extract the validation into a request form class.}
                            {--template-name= : The template name to use when generating the code.}
                            {--force : This option will override the view if one already exists.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a create-views for the model.';

    /**
     * Gets the name of the stub to process.
     *
     * @return string
     */
    protected function getStubName()
    {
        return 'create.blade';
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    protected function handleCreateView()
    {
        $input = $this->getCommandInput();
        $resources = Resource::fromFile($input->resourceFile, $input->languageFileName);
        $destenationFile = $this->getDestinationViewFullname($input->viewsDirectory, $input->prefix);

        if ($this->canCreateView($destenationFile, $input->force, $resources)) {
            $stub = $this->getStub();
            $headers = $this->getHeaderFieldAccessor($resources->fields, $input->modelName);

            $this->createLanguageFile($input->languageFileName, $input->resourceFile, $input->modelName)
                ->createMissingViews($input)
                ->replaceCommonTemplates($stub, $input, $resources->fields)
                ->replaceFileUpload($stub, $resources->fields)
                ->replaceModelHeader($stub, $headers)
                ->replaceFormId($stub, $this->getFormId($input->modelName))
                ->replaceFormName($stub, $this->getFormName($input->modelName))
                ->createFile($destenationFile, $stub)
                ->info('Create view was crafted successfully.');
        }
    }

    /**
     * Gets te create form name
     *
     * @param string $modelName
     *
     * @return string
     */
    protected function getFormName($modelName)
    {
        return sprintf('create_%s_form', Str::snake($modelName));
    }

    /**
     * Gets te create form id
     *
     * @param string $modelName
     *
     * @return string
     */
    protected function getFormId($modelName)
    {
        return sprintf('create_%s_form', Str::snake($modelName));
    }
}
