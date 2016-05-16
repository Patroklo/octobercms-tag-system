<?php namespace Patroklo\Webcomic\FormWidgets;

use Backend\Classes\FormWidgetBase;


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
            $fieldName.= '[]';
        }

        $this->vars['name'] = $fieldName;

        $this->vars['values'] = $this->model->tagNames();
        $this->vars['field'] = $this->formField;
        $this->vars['placeholder'] = $this->placeholder;
        $this->vars['allowClear'] = $this->allowClear;
    }

    /**
     * {@inheritDoc}
     */
    protected function loadAssets()
    {
        $this->addJs('/plugins/patroklo/webcomic/formwidgets/tags/assets/js/tags.js');
    }

}
