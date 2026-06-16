<?php

namespace Core\HTML;
class BootstrapForm extends Form
{
    protected function surround($html): string
    {
        return "<div class='mb-3'>$html</div>";
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
        $label = '<label>' . $label . '</label>';
        if ($type === 'textarea') {
            $input = '<textarea class="form-control" id="' . $name . '" name="' . $name . '" rows="2" cols="100">'.$this->getValue($name)."</textarea>";
        } else {
            $input = '<input type="' . $type . '" name="' . $name . '" value="' . $this->getValue($name) . '" class="form-control"/>';
        }
        return $this->surround($label . $input);
    }

    public function submit($label = "Submit")
    {
        return parent::surround('<button type="submit" class="btn btn-primary">' . $label . '</button>');
    }

    public function dropdown($name, array $list, $label)
    {
        $html = ' 
                <div class="input-group mb-3">
                <div class="">
                <label class="input-group-text" for="inputGroupSelect01">' . $label . '</label>
                </div>
                <select class="form-select" id="inputGroupSelect01">
                <option selected>Choose...</option>
               ';
        foreach ($list as $element) {
            $html .= ' <option value="' . $element->id . '">' . $element->title . '</option>';
        }
        $html .= "</select></div>";
//        var_dump($html);
        return $html;
    }
}