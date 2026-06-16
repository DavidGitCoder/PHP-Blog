<?php

namespace Core\HTML;
/**
 * Class Form
 * Permet de générer un formulaire rapidement et simplement
 */
class Form
{
    /**
     * @var array Données utilisées par le formulaire
     */
    protected $data;
    /**
     * @var string Tag utilisé pour entourer les champs
     */
    public $surround = 'p';

    /**
     * @param array $data Données utilisées par le formulaire
     */
    public function __construct($data = array())
    {
        $this->data = $data;
    }

    /**
     * @param string $html Code HTMl à entourer
     * @return string
     */
    protected function surround($html): string
    {
        return "<{$this->surround}>$html</{$this->surround}>";
    }

    /**
     * @param string $index Indice de la valeur du champs à récupérer
     * @return string
     */
    protected function getValue($index)
    {
        if(is_object($this->data)){
            return $this->data->$index;
        }
        return $this->data[$index] ?? $this->data[$index];
    }

    /**
     * @param string $name
     * @param string $label
     * @param array $options
     * @return string
     */
    public function input($name, $label, $options = []):string
    {
        $type = isset($options['type']) ? $options['type'] : 'text';
        return $this->surround('<input type="' . $type . '" name="' . $label . '" value="' . $this->getValue($name) . '"/>');
    }

    /**
     * @return string
     */
    public function submit()
    {
        return $this->surround('<button type="submit">Submit</button>');
    }

}