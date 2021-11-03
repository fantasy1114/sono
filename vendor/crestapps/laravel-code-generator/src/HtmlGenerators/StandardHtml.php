<?php

namespace CrestApps\CodeGenerator\HtmlGenerators;

use CrestApps\CodeGenerator\HtmlGenerators\HtmlGeneratorBase;
use CrestApps\CodeGenerator\Models\Field;
use CrestApps\CodeGenerator\Models\Label;
use CrestApps\CodeGenerator\Support\Helpers;
use CrestApps\CodeGenerator\Support\Str;
use CrestApps\CodeGenerator\Support\ViewLabelsGenerator;

class StandardHtml extends HtmlGeneratorBase
{
    /**
     * Gets the min value attribute.
     *
     * @param string $minValue
     *
     * @return string
     */
    protected function getFieldMinValueWithName($minValue)
    {
        return is_null($minValue) ? '' : sprintf(' min="%s"', $minValue);
    }

    /**
     * Gets the maxValue attribute.
     *
     * @param string $maxValue
     *
     * @return string
     */
    protected function getFieldMaxValueWithName($maxValue)
    {
        return is_null($maxValue) ? '' : sprintf(' max="%s"', $maxValue);
    }

    /**
     * Get the minLength attribute.
     *
     * @param string $minLength
     *
     * @return string
     */
    protected function getFieldMinLengthName($minLength)
    {
        return empty($minLength) ? '' : sprintf(' minlength="%s"', $minLength);
    }

    /**
     * Gets the maxLength attribute.
     *
     * @param string $maxLength
     *
     * @return string
     */
    protected function getFieldMaxLengthName($maxLength)
    {
        return empty($maxLength) ? '' : sprintf(' maxlength="%s"', $maxLength);
    }

    /**
     * Gets the required attribute.
     *
     * @param string $required
     *
     * @return string
     */
    protected function getFieldRequired($required)
    {
        return $required ? sprintf(' required="%s"', ($required ? 'true' : 'false')) : '';
    }

    /**
     * Get the placeholder attribute.
     *
     * @param CrestApps\CodeGenerator\Models\Label $placeholder
     *
     * @return string
     */
    protected function getFieldPlaceHolder(Label $placeholder = null)
    {
        if (is_null($placeholder)) {
            return '';
        }

        return empty($placeholder) ? '' : sprintf(' placeholder="%s"', $this->getTitle($placeholder, true));
    }

    /**
     * Get the placeholder attribute for a menu.
     *
     * @param CrestApps\CodeGenerator\Models\Label $placeholder
     * @param string $name
     *
     * @return string
     */
    protected function getFieldPlaceHolderForMenu(Label $placeholder = null, $name = '')
    {
        if (is_null($placeholder)) {
            return '';
        }

        return sprintf('<option value="" style="display: none;" {{ %s == \'\' ? \'selected\' : \'\' }} disabled selected>%s</option>', $this->getRawOptionValue($name, ''), $this->getTitle($placeholder, true));
    }

    /**
     * Get the multiple attribute.
     *
     * @param bool $isMulti
     *
     * @return string
     */
    protected function getFieldMultiple($isMulti)
    {
        return $isMulti ? ' multiple="multiple"' : '';
    }

    /**
     * It gets converts an array to a stringbase array for the views.
     *
     * @param CrestApps\CodeGenerator\Models\Field $field
     *
     * @return string
     */
    protected function getFieldItems(Field $field)
    {
        if ($field->hasForeignRelation() && $field->isOnFormView) {
            return sprintf('$%s', $field->getForeignRelation()->getCollectionName());
        }

        $labels = $field->getOptionsByLang() ?: [];

        return sprintf('[%s]', implode(',' . PHP_EOL, $this->getKeyValueStringsFromLabels($labels)));
    }

    /**
     * Gets a plain title from a given label.
     *
     * @param CrestApps\CodeGenerator\Models\Label $label
     * @param bool $raw
     *
     * @return string
     */
    protected function getPlainTitle(Label $label, $raw = false)
    {
        return $label->text;
    }

    /**
     * Gets the fields value
     *
     * @param string $value
     * @param string $name
     *
     * @return string
     */
    protected function getFieldValue($value, $name)
    {
        return sprintf("{{ %s }}", $this->getRawOptionValue($name, $value));
    }

    /**
     * Gets checked item attribute.
     *
     * @param string $value
     * @param string $name
     * @param string $defaultValue
     *
     * @return string
     */
    protected function getCheckedItem($value, $name, $defaultValue)
    {
        return sprintf(
            " {{ %s == '%s' ? 'checked' : '' }}",
            $this->getRawOptionValue($name, $defaultValue),
            $value
        );
    }

    /**
     * Gets multiple-checked item attribute.
     *
     * @param string $value
     * @param string $name
     * @param string $defaultValue
     *
     * @return string
     */
    protected function getMultipleCheckedItem($value, $name, $defaultValue)
    {

        return sprintf(" {{ %s ? 'checked' : '' }}", $this->getMultipleRawOptionValue($name, $value, $defaultValue));
    }

    /**
     * Gets the best value accessor for the view
     *
     * @param string $modelVariable
     * @param string $property
     * @param string $value
     *
     * @return string
     */
    protected function getDefaultValueAccessor($modelVariable, $property, $value)
    {
        if (Helpers::isNewerThanOrEqualTo('5.5')) {
            $template = sprintf('optional($%s)->%s', $modelVariable, $property);

            if (is_null($value) || in_array($value, ['null', '[]'])) {
                return $template;
            }

            return $template . ' ?: ' . $value;
        }

        return sprintf("isset(\$%s->%s) ? \$%s->%s : %s", $modelVariable, $property, $modelVariable, $property, $value);
    }

    /**
     * Gets selected value attribute.
     *
     * @param string $name
     * @param string $valueAccessor
     * @param string $defaultValue
     *
     * @return string
     */
    protected function getMultipleSelectedValue($name, $valueAccessor, $defaultValue)
    {
        return sprintf(" {{ %s ? 'selected' : '' }}", $this->getMultipleRawOptionValue($name, $valueAccessor, $defaultValue));
    }

    /**
     * Gets selected value attribute.
     *
     * @param string $name
     * @param string $valueAccessor
     * @param string $defaultValue
     *
     * @return string
     */
    protected function getSelectedValue($name, $valueAccessor, $defaultValue)
    {
        return sprintf(" {{ %s == %s ? 'selected' : '' }}", $this->getRawOptionValue($name, $defaultValue), $valueAccessor);
    }

    /**
     * Gets a raw value for a given field's name.
     *
     * @param string $name
     * @param string $value
     *
     * @return string
     */
    protected function getRawOptionValue($name, $value)
    {
        $modelVariable = $this->getSingularVariable($this->modelName);

        $valueString = is_null($value) ? 'null' : sprintf("'%s'", $value);

        $accessor = $this->getDefaultValueAccessor($modelVariable, $name, $valueString);

        return sprintf("old('%s', %s)", $name, $accessor);
    }

    /**
     * Gets a raw value for a given field's name.
     *
     * @param string $name
     * @param string $value
     * @param string $defaultValue
     *
     * @return string
     */
    protected function getMultipleRawOptionValue($name, $value, $defaultValue)
    {
        $modelVariable = $this->getSingularVariable($this->modelName);
        $valueString = 'null';

        if (!is_null($value)) {
            $valueString = Str::startsWith($value, '$') ? sprintf("%s", $value) : sprintf("'%s'", $value);
        }

        $defaultValueString = '[]';

        if (!empty($defaultValue)) {
            $joinedValues = implode(',', Arr::wrapItems((array) $defaultValue));
            $defaultValueString = sprintf('[%s]', $joinedValues);
        }

        $accessor = $this->getDefaultValueAccessor($modelVariable, $name, $defaultValueString);

        return sprintf("in_array(%s, old('%s', %s) ?: [])", $valueString, $name, $accessor);
    }

    /**
     * Creates html label.
     *
     * @param string $name
     * @param CrestApps\CodeGenerator\Models\Label $label
     *
     * @return string
     */
    protected function getLabelElement($name, Label $label)
    {
        $labelStub = $this->getStubContent('form-label-field.blade', $this->template);

        $this->replaceFieldName($labelStub, $name)
            ->replaceFieldTitle($labelStub, $this->getTitle($label, true));

        return $labelStub;
    }

    /**
     * Gets the html steps attribute.
     *
     * @param int value
     *
     * @return string
     */
    protected function getStepsValue($value)
    {
        return ($value) > 0 ? ' step="any"' : '';
    }

    /**
     * Gets an instance of ViewLabelsGenerator
     *
     * @return CrestApps\CodeGenerator\Support\ViewLabelsGenerator
     */
    protected function getViewLabelsGenerator()
    {
        return new ViewLabelsGenerator($this->modelName, $this->fields, true);
    }
}
