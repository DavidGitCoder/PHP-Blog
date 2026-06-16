<?php

namespace Core\HTML;
class BootstrapForm extends Form
{
    protected function surround($html): string
    {
        return "<div class='row mb-3'>$html</div>";
    }

    /**
     * @param string $name
     * @param string $label
     * @param array $options
     * @return string
     */
    public function input($name, $label, $options = []): string
    {
        $type = isset($options['type']) ? $options['type'] : 'text';
        return $this->surround(
            '<label>' . $label . '</label>' .
            '<input type="' . $type . '" name="' . $name . '" value="' .
            $this->getValue($name) . '" class="form-control"/>');
    }

    public function submit()
    {
        return parent::surround('<button type="submit" class="btn btn-primary">Submit</button>');
    }
}