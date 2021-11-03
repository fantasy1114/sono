<?php

namespace CrestApps\CodeGenerator\Commands;

use App;
use CrestApps\CodeGenerator\Commands\Bases\ControllerCommandBase;
use CrestApps\CodeGenerator\Models\ForeignRelationship;
use CrestApps\CodeGenerator\Models\Resource;
use CrestApps\CodeGenerator\Support\Config;
use CrestApps\CodeGenerator\Support\Helpers;
use CrestApps\CodeGenerator\Support\ViewLabelsGenerator;

class CreateControllerCommand extends ControllerCommandBase
{
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new controller.';

    /**
     * The request variable to use in the controller.
     *
     * @var string
     */
    protected $requestVariable = '$request';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:controller
                            {model-name : The model name that this controller will represent.}
                            {--controller-name= : The name of the controler.}
                            {--controller-directory= : The directory where the controller should be created under.}
                            {--model-directory= : The path where the model should be created under.}
                            {--views-directory= : The path where the views should be created under.}
                            {--resource-file= : The name of the resource-file to import from.}
                            {--routes-prefix=default-form : Prefix of the route group.}
                            {--models-per-page=25 : The amount of models per page for index pages.}
                            {--language-filename= : The languages file name to put the labels in.}
                            {--with-form-request : This will extract the validation into a request form class.}
                            {--without-form-request : Generate the controller without the form-request file. }
                            {--with-auth : Generate the controller with Laravel auth middlewear. }
                            {--template-name= : The template name to use when generating the code.}
                            {--form-request-directory= : The directory of the form-request.}
                            {--controller-extends=Http\Controllers\Controller : The base controller to be extend.}
                            {--force : This option will override the controller if one already exists.}';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Controller';

    /**
     * Gets the desired class name from the command-line.
     *
     * @return string
     */
    public function getNameInput()
    {
        $name = Helpers::upperCaseEveyWord(trim($this->argument('controller-name')));
        $path = Config::getControllersPath();
        $directory = trim($this->option('controller-directory'));

        if (!empty($directory)) {
            $path .= Helpers::getPathWithSlash($directory);
        }

        return Helpers::convertSlashToBackslash($path . Helpers::postFixWith($name, Config::getControllerNamePostFix()));
    }

    /**
     * Build the model class with the given name.
     *
     * @param  string  $name
     *
     * @return string
     */
    public function handle()
    {
        $input = $this->getCommandInput();

        $resources = Resource::fromFile($input->resourceFile, $input->langFile);

        $destenationFile = $this->getDestenationFile($input->controllerName, $input->controllerDirectory);

        if ($this->hasErrors($resources, $destenationFile)) {
            return false;
        }

        $requestName = 'Request';
        $requestNameSpace = 'Illuminate\Http\Request';

        if ($input->withFormRequest) {
            $requestName = $input->formRequestName;
            $requestNameSpace = $this->getRequestsNamespace($requestName, $input->formRequestDirectory);

            if (!$this->option('without-form-request')) {
                $this->makeFormRequest($input);
            }
        }

        $fields = $resources->fields;
        $viewVariablesForIndex = $this->getCompactVariablesFor($fields, $this->getPluralVariable($input->modelName), 'index');
        $viewVariablesForShow = $this->getCompactVariablesFor($fields, $this->getSingularVariable($input->modelName), 'show');
        $viewVariablesForEdit = $this->getCompactVariablesFor($fields, $this->getSingularVariable($input->modelName), 'form');
        $modelNamespace = $this->getModelNamespace($input->modelName, $input->modelDirectory);
        $affirmMethod = $this->getAffirmMethod($input->withFormRequest, $fields, $requestNameSpace, $input);
        $classToExtendFullname = $this->getFullClassToExtend($input->extends);
        $namespacesToUse = $this->getRequiredUseClasses($fields, [$modelNamespace, $requestNameSpace, $classToExtendFullname]);
        $dataMethod = $this->getDataMethod($fields, $requestNameSpace . '\\' . $requestName, $input);
        $stub = $this->getStubContent('controller');
        $languages = array_keys(Helpers::getLanguageItems($fields));
        $viewLabels = new ViewLabelsGenerator($input->modelName, $fields, $this->isCollectiveTemplate());
        $standardLabels = $viewLabels->getLabels();

        return $this->replaceViewNames($stub, $input->viewDirectory, $input->prefix)
            ->replaceGetDataMethod($stub, $dataMethod)
            ->replaceCallDataMethod($stub, $this->getCallDataMethod($input->withFormRequest))
            ->replaceModelName($stub, $input->modelName)
            ->replaceNamespace($stub, $this->getControllersNamespace($input->controllerDirectory))
            ->replaceControllerExtends($stub, $this->getControllerExtends($classToExtendFullname))
            ->replaceUseCommandPlaceholder($stub, $namespacesToUse)
            ->replaceRouteNames($stub, $this->getModelName($input->modelName), $input->prefix)
            ->replaceConstructor($stub, $this->getConstructor($input->withAuth))
            ->replaceCallAffirm($stub, $this->getCallAffirm($input->withFormRequest))
            ->replaceAffirmMethod($stub, $affirmMethod)
            ->replacePaginationNumber($stub, $input->perPage)
            ->replaceFileMethod($stub, $this->getUploadFileMethod($fields, $input->withFormRequest))
            ->replaceViewVariablesForIndex($stub, $viewVariablesForIndex)
            ->replaceViewVariablesForShow($stub, $viewVariablesForShow)
            ->replaceViewVariablesForCreate($stub, $this->getCompactVariablesFor($fields, null, 'form'))
            ->replaceViewVariablesForEdit($stub, $viewVariablesForEdit)
            ->replaceWithRelationsForIndex($stub, $this->getWithRelationFor($fields, 'index'))
            ->replaceWithRelationsForShow($stub, $this->getWithRelationFor($fields, 'show'))
            ->replaceRelationCollections($stub, $this->getRequiredRelationCollections($fields))
            ->replaceOnStoreAction($stub, $this->getOnStoreAction($fields))
            ->replaceOnUpdateAction($stub, $this->getOnUpdateAction($fields))
            ->replaceAppName($stub, Helpers::getAppName())
            ->replaceControllerName($stub, $input->controllerName)
            ->replaceDataVariable($stub, 'data')
            ->replaceRequestName($stub, $requestName)
            ->replaceRequestFullName($stub, $requestNameSpace)
            ->replaceRequestVariable($stub, $this->requestVariable)
            ->replaceTypeHintedRequestName($stub, $this->getTypeHintedRequestName($requestName))
            ->replaceStandardLabels($stub, $standardLabels)
            ->createFile($destenationFile, $stub)
            ->info('A controller was crafted successfully.');
    }

    /**
     * Build the model class with the given name.
     *
     * @param  CrestApps\CodeGenerator\Models\Resource $resource
     * @param string $destenationFile
     *
     * @return bool
     */
    protected function hasErrors(Resource $resource, $destenationFile)
    {
        $hasErrors = false;

        if ($resource->isProtected('controller')) {
            $this->warn('The controller is protected and cannot be regenerated. To regenerate the file, unprotect it from the resource file.');

            $hasErrors = true;
        }

        if ($this->alreadyExists($destenationFile)) {
            $this->error('The controller already exists! To override the existing file, use --force option.');

            $hasErrors = true;
        }

        return $hasErrors;
    }

    /**
     * Extracts a namespace from a given string
     *
     * @param string $string
     *
     * @return string
     */
    protected function extractClassFromString($string)
    {
        $string = trim($string);

        if ($this->isQualifiedNamespace($string)) {
            if (($index = strrpos($string, '::')) !== false) {
                $subString = substr($string, 0, $index);

                if (($positionOfSlash = strrpos($subString, '\\')) != false) {
                    return substr($string, $positionOfSlash + 1);
                }
            }

            if (($index = strrpos($string, '\\')) !== false) {
                $string = substr($string, $index + 1);
            }
        }

        return $string;
    }

    /**
     * Gets the signature of the getData method.
     *
     * @param array  $fields
     * @param string $requestFullname
     * @param bool   $withFormRequest
     * @param object $input
     *
     * @return string
     */
    protected function getDataMethod(array $fields, $requestFullname, $input)
    {
        if ($input->withFormRequest) {
            return '';
        }

        $stub = $this->getDataMethodStubContent();

        $this->replaceFileSnippet($stub, $this->getFileSnippet($fields, $this->requestVariable))
            ->replaceValidationRules($stub, $this->getValidationRules($fields))
            ->replaceFillables($stub, $this->getFillables($fields))
            ->replaceFileValidationSnippet($stub, $this->getFileValidationSnippet($fields, $input, $this->requestVariable))
            ->replaceBooleadSnippet($stub, $this->getBooleanSnippet($fields, $this->requestVariable))
            ->replaceStringToNullSnippet($stub, $this->getStringToNullSnippet($fields))
            ->replaceRequestNameComment($stub, $this->getRequestNameComment($requestFullname))
            ->replaceMethodVisibilityLevel($stub, 'protected');

        $stub = str_replace(PHP_EOL . PHP_EOL, PHP_EOL, $stub);

        return $stub;
    }

    /**
     * Extracts a namespace from a given string
     *
     * @param string $string
     *
     * @return string
     */
    protected function extractNamespace($string)
    {
        $string = trim($string);

        if ($this->isQualifiedNamespace($string) && ($index = strrpos($string, '::')) != false) {
            $namespace = substr($string, 0, $index);

            if (!empty($namespace)) {
                return $this->getUseClassCommand($namespace);
            }
        }

        return null;
    }

    /**
     * Gets the affirm method.
     *
     * @param bool $withFormRequest
     * @param array $fields
     * @param string $requestNamespace
     * @param (ibject) $input
     *
     * @return string
     */
    protected function getAffirmMethod($withFormRequest, array $fields, $requestNamespace, $input)
    {
        if ($withFormRequest || Helpers::isNewerThanOrEqualTo('5.5')) {
            return '';
        }

        $stub = $this->getStubContent('controller-affirm-method');

        $this->replaceValidationRules($stub, $this->getValidationRules($fields))
            ->replaceFileValidationSnippet($stub, $this->getFileValidationSnippet($fields, $input, $this->requestVariable))
            ->replaceRequestFullName($stub, $requestNamespace);

        return $stub;
    }

    /**
     * Gets the content of a controller-getdata-method stub.
     *
     * @return string
     */
    protected function getDataMethodStubContent()
    {
        $stubName = 'controller-getdata-method';

        if (Helpers::isNewerThanOrEqualTo('5.5')) {
            $stubName .= '-5.5';
        }

        return $this->getStubContent($stubName);
    }

    /**
     * Get a string to set a given $variable with a $key and $value pair
     *
     * @param string $key
     * @param string $value
     * @param string $variable
     *
     * @return string
     */
    protected function getArrayReadyString($key, $value, $variable = '$data')
    {
        $value = trim(rtrim($value, ';'));

        return sprintf("%s['%s'] = %s;", $variable, $key, $value);
    }

    /**
     * Gets the affirm method call.
     *
     * @param bool $withFormRequest
     *
     * @return string
     */
    protected function getCallAffirm($withFormRequest)
    {
        if ($withFormRequest || Helpers::isNewerThanOrEqualTo('5.5')) {
            return '';
        }

        return '$this->affirm($request);';
    }

    /**
     * Gets the method that calls the getData()
     *
     * @param bool $withFormRequest
     *
     * @return string
     */
    protected function getCallDataMethod($withFormRequest)
    {
        if ($withFormRequest) {
            return sprintf('%s->getData()', $this->requestVariable);
        }

        return sprintf('$this->getData(%s)', $this->requestVariable);
    }

    /**
     * Gets a clean command-line arguments and options.
     *
     * @return object
     */
    protected function getCommandInput()
    {
        $modelName = trim($this->argument('model-name'));
        $cName = trim($this->option('controller-name'));
        $controllerName = $cName ? str_finish($cName, Config::getControllerNamePostFix()) : Helpers::makeControllerName($modelName);
        $viewDirectory = $this->option('views-directory');
        $prefix = ($this->option('routes-prefix') == 'default-form') ? Helpers::makeRouteGroup($modelName) : $this->option('routes-prefix');
        $perPage = intval($this->option('models-per-page'));
        $resourceFile = trim($this->option('resource-file')) ?: Helpers::makeJsonFileName($modelName);
        $langFile = $this->option('language-filename') ?: Helpers::makeLocaleGroup($modelName);
        $withFormRequest = $this->option('with-form-request');
        $force = $this->option('force');
        $modelDirectory = $this->option('model-directory');
        $controllerDirectory = trim($this->option('controller-directory'));
        $formRequestName = Helpers::makeFormRequestName($modelName);
        $template = $this->getTemplateName();
        $formRequestDirectory = trim($this->option('form-request-directory'));
        $extends = $this->generatorOption('controller-extends');
        $withAuth = $this->option('with-auth');

        return (object) compact(
            'formRequestDirectory',
            'viewDirectory',
            'modelName',
            'prefix',
            'perPage',
            'modelDirectory',
            'langFile',
            'withFormRequest',
            'formRequestName',
            'force',
            'resourceFile',
            'template',
            'controllerName',
            'extends',
            'withAuth',
            'controllerDirectory'
        );
    }

    /**
     * Converts given array of variables to a compact statements.
     *
     * @param array $variables
     *
     * @return string
     */
    protected function getCompactVariables(array $variables)
    {
        if (empty($variables)) {
            return '';
        }

        return sprintf(', compact(%s)', implode(',', Helpers::wrapItems($variables)));
    }

    /**
     * Gets the needed compact variables for the edit/create views.
     *
     * @param array $fields
     *
     * @return string
     */
    protected function getCompactVariablesFor(array $fields, $modelName, $view)
    {
        $variables = [];

        if (!empty($modelName)) {
            $variables[] = $modelName;
        }

        if ($view == 'form') {
            $collections = $this->getRelationCollections($fields, $view);

            foreach ($collections as $collection) {
                $variables[] = $collection->getCollectionName();
            }
        }

        return $this->getCompactVariables($variables);
    }

    /**
     * Gets controller's constructor.
     *
     * @param bool $withAuth
     *
     * @return string
     */
    protected function getConstructor($withAuth)
    {
        $stub = $this->getStubContent('controller-constructor');

        $middleware = $withAuth ? '$this->middleware(\'auth\');' : '';

        $this->replaceAuthMiddlewear($stub, $middleware);

        $starts = strpos($stub, '{');
        $ends = strrpos($stub, '}');

        if ($starts !== false && $ends !== false) {
            $content = trim(substr($stub, $starts + 1, $ends - $starts - 1));
            if (!empty($content)) {
                return $stub;
            }
        }

        return '';
    }

    /**
     * Gets the code to extend the controller.
     *
     * @param string $namespace
     *
     * @return string
     */
    protected function getControllerExtends($namespace)
    {
        $class = $this->extractClassFromString($namespace);
        if (!empty($class)) {
            return sprintf('extends %s', $class);
        }

        return '';
    }

    /**
     * Gets the controllers namespace
     *
     * @param string $path
     *
     * @return string
     */
    protected function getControllersNamespace($path)
    {
        $path = Helpers::getAppNamespace() . Config::getControllersPath($path);

        return rtrim(Helpers::convertSlashToBackslash($path), '\\');
    }

    /**
     * Gets the destenation file to be created.
     *
     * @param string $name
     * @param string $path
     *
     * @return string
     */
    protected function getDestenationFile($name, $path)
    {
        if (!empty($path)) {
            $path = Helpers::getPathWithSlash(ucfirst($path));
        }

        return app_path(Config::getControllersPath($path . $name . '.php'));
    }

    /**
     * Gets the full class name to extend
     *
     * @param string $extend
     *
     * @return string
     */
    protected function getFullClassToExtend($extend)
    {
        if (empty($extend)) {
            return '';
        }
        $appNamespace = Helpers::getAppNamespace();

        if (starts_with($extend, $appNamespace)) {
            $extend = str_replace($appNamespace, '', $extend);
        }

        return $appNamespace . trim($extend, '\\');
    }

    /**
     * Gets the namespace of the model
     *
     * @param  string $modelName
     * @param  string $modelDirectory
     *
     * @return string
     */
    protected function getModelNamespace($modelName, $modelDirectory)
    {
        if (!empty($modelDirectory)) {
            $modelDirectory = str_finish($modelDirectory, '\\');
        }

        $namespace = Helpers::getAppNamespace() . ltrim(Config::getModelsPath($modelDirectory . $modelName), '\\');

        return rtrim(Helpers::convertSlashToBackslash($namespace), '\\');
    }

    /**
     * Gets the setter action for the given field on-store.
     *
     * @param array $fields
     * @param string $view
     *
     * @return string
     */
    protected function getOnStoreAction(array $fields)
    {
        $final = [];

        foreach ($fields as $field) {
            $action = $this->extractClassFromString($field->onStore);
            if (!empty($action)) {
                $final[] = $this->getArrayReadyString($field->name, $action);
            }
        }

        return implode(PHP_EOL, $final);
    }

    /**
     * Gets the setter action for the given field on-update.
     *
     * @param array $fields
     * @param string $view
     *
     * @return string
     */
    protected function getOnUpdateAction(array $fields)
    {
        $final = [];

        foreach ($fields as $field) {
            $action = $this->extractClassFromString($field->onUpdate);
            if (!empty($action)) {
                $final[] = $this->getArrayReadyString($field->name, $action);
            }
        }

        return implode(PHP_EOL, $final);
    }

    /**
     * Gets the relation accessor for the given foreign renationship.
     *
     * @param CrestApps\CodeGenerator\Models\ForeignRelationship $collection
     *
     * @return string
     */
    protected function getRelationAccessor(ForeignRelationship $collection)
    {
        return sprintf(
            '$%s = %s::pluck(\'%s\',\'%s\')->all();',
            $collection->getCollectionName(),
            $collection->getForeignModel(),
            $collection->getField(),
            $collection->getPrimaryKeyForForeignModel()
        );
    }

    /**
     * Gets the needed compact variables for the edit/create views.
     *
     * @param array $fields
     *
     * @return array
     */
    protected function getRelationCollections(array $fields, $view)
    {
        $variables = [];

        foreach ($fields as $field) {
            if ($field->hasForeignRelation() && $field->isOnView($view)) {
                $variables[] = $field->getForeignRelation();
            }
        }

        return $variables;
    }

    /**
     * Gets the Requests namespace
     *
     * @param string $name
     * @param string $path
     *
     * @return string
     */
    protected function getRequestsNamespace($name, $path)
    {
        if (!empty($path)) {
            $path = str_finish($path, '\\');
        }

        $path = Helpers::getAppNamespace() . Config::getRequestsPath($path);

        return Helpers::convertSlashToBackslash($path) . $name;
    }

    /**
     * Gets the needed compact variables for the edit/create views.
     *
     * @param array $fields
     *
     * @return string
     */
    protected function getRequiredRelationCollections(array $fields)
    {
        $variables = [];

        $collections = $this->getRelationCollections($fields, 'form');

        foreach ($collections as $collection) {
            $accesor = $this->getRelationAccessor($collection);

            if (!in_array($accesor, $variables)) {
                $variables[] = $accesor;
            }
        }

        return implode(PHP_EOL, $variables);
    }

    /**
     * Gets the needed models to use for in the controller.
     *
     * @param array $fields
     * @param array $additions
     *
     * @return string
     */
    protected function getRequiredUseClasses(array $fields, array $additions = [])
    {
        $commands = [];

        foreach ($additions as $addition) {
            $commands[] = $this->getUseClassCommand($addition);
        }

        $collections = $this->getRelationCollections($fields, 'form');

        foreach ($collections as $collection) {
            $command = $this->getUseClassCommand($collection->getFullForeignModel());

            if (!in_array($command, $commands)) {
                $commands[] = $this->getUseClassCommand($collection->getFullForeignModel());
            }
        }

        // Attempt to include classes that don't start with \\ with using command.
        foreach ($fields as $field) {
            if (!empty($field->onStore) && !in_array($field->onStore, $commands)) {
                $commands[] = $this->extractNamespace($field->onStore);
            }

            if (!empty($field->onUpdate) && !in_array($field->onUpdate, $commands)) {
                $commands[] = $this->extractNamespace($field->onUpdate);
            }
            // Extract the name spaces fromt he custom rules
            $customRules = $this->extractCustomValidationRules($field->getValidationRule());
            $namespaces = $this->extractCustomValidationNamespaces($customRules);
            foreach ($namespaces as $namespace) {
                $commands[] = $this->getUseClassCommand($namespace);
            }
        }

        usort($commands, function ($a, $b) {
            return strlen($a) - strlen($b);
        });

        return implode(PHP_EOL, array_unique($commands));
    }

    /**
     * Gets the type hinted request name
     *
     * @param string $name
     *
     * @return string
     */
    protected function getTypeHintedRequestName($name)
    {
        return sprintf('%s %s', $name, $this->requestVariable);
    }

    /**
     * Gets the needed compact variables for the edit/create views.
     *
     * @param array $fields
     * @param string $view
     *
     * @return string
     */
    protected function getWithRelationFor(array $fields, $view)
    {
        $variables = [];
        $collections = $this->getRelationCollections($fields, $view);

        foreach ($collections as $collection) {
            if (!in_array($collection->name, $variables)) {
                $variables[] = strtolower($collection->name);
            }
        }

        return $this->getWithRelationsStatement($variables);
    }

    /**
     * Converts given array of relation name to a with() statements.
     *
     * @param array $variables
     *
     * @return string
     */
    protected function getWithRelationsStatement(array $relations)
    {
        if (empty($relations)) {
            return '';
        }

        return sprintf('with(%s)->', implode(',', Helpers::wrapItems($relations)));
    }

    /**
     * Checks if a given fields array conatins at least one multiple answers' field.
     *
     * @param array
     *
     * @return bool
     */
    protected function isContainMultipleAnswers(array $fields)
    {
        $filtered = array_filter($fields, function ($field) {
            return $field->isMultipleAnswers();
        });

        return count($filtered) > 0;
    }

    /**
     * Checks if a string is a qualified namespace.
     *
     * @param string $name
     *
     * @return bool
     */
    protected function isQualifiedNamespace($name)
    {
        return !empty($name) && !starts_with($name, '\\');
    }

    /**
     * Calls the create:form-request command
     *
     * @param  CrestApps\CodeGenerator\Models\ViewInput $input
     *
     * @return $this
     */
    protected function makeFormRequest($input)
    {
        $this->callSilent(
            'create:form-request',
            [
                'model-name' => $input->modelName,
                '--class-name' => $input->formRequestName,
                '--with-auth' => $input->withAuth,
                '--resource-file' => $input->resourceFile,
                '--template-name' => $input->template,
                '--routes-prefix' => $this->option('routes-prefix'),
                '--form-request-directory' => $input->formRequestDirectory,
                '--force' => $input->force,
            ]
        );

        return $this;
    }

    /**
     * Replaces affirm method for the given stub.
     *
     * @param  string  $stub
     * @param  string  $name
     *
     * @return $this
     */
    protected function replaceAffirmMethod(&$stub, $name)
    {
        return $this->replaceTemplate('affirm_method', $name, $stub);
    }

    /**
     * Replaces the auth middleware
     *
     * @param  string  $stub
     * @param  string  $middleware
     *
     * @return $this
     */
    protected function replaceAuthMiddlewear(&$stub, $middleware)
    {
        return $this->replaceTemplate('auth_middleware', $middleware, $stub);
    }

    /**
     * Replaces call affirm for the given stub.
     *
     * @param  string  $stub
     * @param  string  $name
     *
     * @return $this
     */
    protected function replaceCallAffirm(&$stub, $name)
    {
        return $this->replaceTemplate('call_affirm', $name, $stub);
    }

    /**
     * Replaces call_get_data
     *
     * @param  string  $stub
     * @param  string  $code
     *
     * @return $this
     */
    protected function replaceCallDataMethod(&$stub, $code)
    {
        return $this->replaceTemplate('call_get_data', $code, $stub);
    }

    /**
     * Replaces the auth contructor
     *
     * @param  string  $stub
     * @param  string  $contructor
     *
     * @return $this
     */
    protected function replaceConstructor(&$stub, $contructor)
    {
        return $this->replaceTemplate('constructor', $contructor, $stub);
    }

    /**
     * Replaces controller_extends
     *
     * @param  string  $stub
     * @param  string  $commands
     *
     * @return $this
     */
    protected function replaceControllerExtends(&$stub, $commands)
    {
        return $this->replaceTemplate('controller_extends', $commands, $stub);
    }

    /**
     * Replaces the data_variable.
     *
     * @param  string  $stub
     * @param  string  $commands
     *
     * @return $this
     */
    protected function replaceDataVariable(&$stub, $commands)
    {
        return $this->replaceTemplate('data_variable', $commands, $stub);
    }

    /**
     * Replaces the upload-method's code for the given stub.
     *
     * @param $stub
     * @param $method
     *
     * @return $this
     */
    protected function replaceFileMethod(&$stub, $method)
    {
        return $this->replaceTemplate('upload_method', $method, $stub);
    }

    /**
     * Replaces on_store_setter
     *
     * @param  string  $stub
     * @param  string  $commands
     *
     * @return $this
     */
    protected function replaceOnStoreAction(&$stub, $commands)
    {
        return $this->replaceTemplate('on_store_setter', $commands, $stub);
    }

    /**
     * Replaces on_update_setter
     *
     * @param  string  $stub
     * @param  string  $commands
     *
     * @return $this
     */
    protected function replaceOnUpdateAction(&$stub, $commands)
    {
        return $this->replaceTemplate('on_update_setter', $commands, $stub);
    }

    /**
     * Replaces the models per page total for the given stub.
     *
     * @param $stub
     * @param $total
     *
     * @return $this
     */
    protected function replacePaginationNumber(&$stub, $total)
    {
        return $this->replaceTemplate('models_per_page', $total, $stub);
    }

    /**
     * Replaces relationCollections for the given stub.
     *
     * @param $stub
     * @param $collections
     *
     * @return $this
     */
    protected function replaceRelationCollections(&$stub, $collections)
    {
        return $this->replaceTemplate('relation_collections', $collections, $stub);
    }

    /**
     * Replace sthe form-request's fullname for the given stub.
     *
     * @param  string  $stub
     * @param  string  $name
     *
     * @return $this
     */
    protected function replaceRequestFullName(&$stub, $name)
    {
        return $this->replaceTemplate('request_fullname', $name, $stub);
    }

    /**
     * Replaces the form-request's name for the given stub.
     *
     * @param  string  $stub
     * @param  string  $name
     *
     * @return $this
     */
    protected function replaceRequestName(&$stub, $name)
    {
        return $this->replaceTemplate('request_name', $name, $stub);
    }

    /**
     * Replaces request variable.
     *
     * @param  string  $stub
     * @param  string  $variable
     *
     * @return $this
     */
    protected function replaceRequestVariable(&$stub, $variable)
    {
        return $this->replaceTemplate('request_variable', $variable, $stub);
    }

    /**
     * It Replaces the templates of the givin $labels
     *
     * @param string $stub
     * @param array $items
     *
     * @return $this
     */
    protected function replaceStandardLabels(&$stub, array $items)
    {
        foreach ($items as $labels) {
            foreach ($labels as $label) {
                $text = $label->isPlain ? sprintf("'%s'", $label->text) : sprintf("trans('%s')", $label->localeGroup);
                $stub = $this->strReplace($label->template, $text, $stub);
            }
        }

        return $this;
    }

    /**
     * Replaces the type_hinted_request_name for the given stub.
     *
     * @param $stub
     * @param $code
     *
     * @return $this
     */
    protected function replaceTypeHintedRequestName(&$stub, $code)
    {
        return $this->replaceTemplate('type_hinted_request_name', $code, $stub);
    }

    /**
     * Replaces the create-view variables.
     *
     * @param $stub
     * @param $variables
     *
     * @return $this
     */
    protected function replaceViewVariablesForCreate(&$stub, $variables)
    {
        return $this->replaceTemplate('view_variables_for_create', $variables, $stub);
    }

    /**
     * Replaces the create-edit variables.
     *
     * @param $stub
     * @param $variables
     *
     * @return $this
     */
    protected function replaceViewVariablesForEdit(&$stub, $variables)
    {
        return $this->replaceTemplate('view_variables_for_edit', $variables, $stub);
    }

    /**
     * Replaces the create-index variables.
     *
     * @param $stub
     * @param $variables
     *
     * @return $this
     */
    protected function replaceViewVariablesForIndex(&$stub, $variables)
    {
        return $this->replaceTemplate('view_variables_for_index', $variables, $stub);
    }

    /**
     * Replaces the create-show variables.
     *
     * @param $stub
     * @param $variables
     *
     * @return $this
     */
    protected function replaceViewVariablesForShow(&$stub, $variables)
    {
        return $this->replaceTemplate('view_variables_for_show', $variables, $stub);
    }

    /**
     * Replaces withRelationsForIndex for the given stub.
     *
     * @param $stub
     * @param $relations
     *
     * @return $this
     */
    protected function replaceWithRelationsForIndex(&$stub, $relations)
    {
        return $this->replaceTemplate('with_relations_for_index', $relations, $stub);
    }

    /**
     * Replaces withRelationsForShow for the given stub.
     *
     * @param $stub
     * @param $relations
     *
     * @return $this
     */
    protected function replaceWithRelationsForShow(&$stub, $relations)
    {
        return $this->replaceTemplate('with_relations_for_show', $relations, $stub);
    }
}
