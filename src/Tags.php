<?php namespace Patroklo\Tags;

use Backend\Classes\FormWidgetBase;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class Tags
 * @package Patroklo\Webcomic\FormWidgets
 */
class Tags extends FormWidgetBase
{

    public $placeholder;

    public $allowClear = false;

    /**
     * {@inheritDoc}
     */
    protected $defaultAlias = 'tags';

    /**
     * {@inheritDoc}
     */
    public function init()
    {
        $this->fillFromConfig([
            'placeholder',
            'allowClear'
        ]);
    }

    /**
     * {@inheritDoc}
     */
    public function render()
    {
        $this->prepareVars();
        return $this->makePartial('tag');
    }

    /**
     * Prepares the view data
     */
    protected function prepareVars()
    {
        $fieldName = $this->formField->getName();

        if (substr($fieldName, -2) != '[]')
        {
            $fieldName .= '[]';
        }

        $this->vars['name'] = $fieldName;

        $value = $this->getLoadValue();

        // If it's a collection will return
        // the first fillable element
        if (is_a($value, Collection::class))
        {
            if (!$value->isEmpty())
            {
                $first = $value->first();

                $fillable = reset($first->fillable);

                $value = array_pluck($value->toArray(), $fillable);
            }
            else
            {
                $value = [];
            }

        }

        if (!is_array($value) and !is_null($value))
        {
            throw new \Exception('Field ' . $this->fieldName . ' value must be null or an array.');
        }

        $this->vars['values'] = $value;
        $this->vars['field'] = $this->formField;
        $this->vars['placeholder'] = $this->placeholder;
        $this->vars['allowClear'] = $this->allowClear;
    }

    /**
     * {@inheritDoc}
     */
    protected function loadAssets()
    {
        $this->addJs('/public/js/tags.js');
    }
}