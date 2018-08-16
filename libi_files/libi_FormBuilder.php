<?php

/**
 * Class FormBuilder Creates easily simple forms
 */
class FormBuilder
{

    /**
     * @var string the complete string
     */
    private $form;
    /**
     * @var string Start of the form (not including the form tag itself (created with construct)
     */
    private $begin = '<table border="0">';
    /**
     * @var string end tags. Must contain form
     */
    private $end = '</table></form>';
    /**
     * @var string string bit used at the start of every added input
     */
    private $beginEach = '<tr><td>';
    /**
     * @var string string bit used in between label
     */
    private $betweenEach = '</td><td>';
    /**
     * @var string string bit used at the end of every added input
     */
    private $endEach = '</td></tr>';

    /**
     * FormBuilder constructor.
     * @param string $args eventual argds (id...)
     * @param string $page page to redirect to
     * @param string $type Post or Get
     */
    public function __construct($args = "", $page = '', $type = 'POST')
    {
        if (!in_array($type, array('POST', 'post', 'GET', 'get', 'Post', 'Get')))
            trigger_error('Invalid form method ' . $type . ' on form');
        $this->form = '<form ' . $args . ' method="' . $type . '" action="' . $page . '">
		';

    }

    /**
     * Add a simple input
     * @param string $name PHP name
     * @param string $label
     * @param string $type input type
     * @param string $args eventual args
     * @return FormBuilder $this
     */
    public function addInput($name, $label, $type = 'text', $args = '')
    {
        $this->form .= $this->beginEach . '<label for="' . $name . '">' . $label . '</label>' . $this->betweenEach . "<input type=\"$type\" name=\"$name\" id=\"$name\" $args />" . $this->endEach;
        return $this;

    }
    /**
     * Add a textarea
     * @param string $name PHP name
     * @param string $label
     * @param string $value default value
     * @param string $args eventual args
     * @return FormBuilder $this
     */
    public function addTextArea($name, $label, $args = '', $value = '')
    {
        $this->form .= $this->beginEach . '<label for="' . $name . '">' . $label . '</label>' . $this->betweenEach . "<textarea name=\"$name\" id=\"$name\" $args>$value</textarea>" . $this->endEach;
        return $this;
    }

    /**
     * Bridge to add a simple submit
     * @param string $label label
     * @param string $display message to display in button
     * @param string $name PHP name
     * @return FormBuilder
     */
    public function addSubmitButton($label = '', $display = '',$name='submit')
    {
        return $this->addinput('submit', $label, 'submit', 'value="' . $display . '" name="'.$name.'"');
    }

    /**
     * @param string $name PHP name
     * @param string $label label
     * @param PDOStatement $query
     * @return FormBuilder $this
     * @throws InvalidArgumentException
     */
    public function addSelectItemFromPdo($name, $label, PDOStatement $query)
    {
        if (!$query)
            throw new InvalidArgumentException('Query null in addSelectItemFromPdo');
        $this->form .= $this->beginEach . '<label for="' . $name . '">' . $label . '</label>' . $this->betweenEach . '<select name="' . $name . '" id="' . $name . '">';
        while ($ligne = $query->fetch()) {
            $this->form .= '<option value="' . $ligne[0] . '">' . $ligne[1] . '</option>';
        }
        $this->form .= '</select>' . $this->endEach;
        return $this;
    }

    /**
     * Add an hidden field
     * @param string $name PHP name
     * @param string $value value of field
     * @param string $args possibly more args
     * @return FormBuilder $this
     */
    public function addHiddenInput($name, $value = '1', $args = '')
    {
        $this->form .= '<input type="hidden" name="' . $name . '" value="' . $value . '" ' . $args . ' />';
        return $this;
    }

    /**
     * Return the forms as a string
     * @return string
     */
    public function render()
    {
        return $this->begin . $this->form . $this->end;
    }


    /**
     * @param string $begin
     */
    public function setBegin($begin)
    {
        $this->begin = $begin;
    }

    /**
     * @param string $end
     */
    public function setEnd($end)
    {
        $this->end = $end;
    }

    /**
     * @param string $beginEach
     */
    public function setBeginEach($beginEach)
    {
        $this->beginEach = $beginEach;
    }

    /**
     * @param string $betweenEach
     */
    public function setBetweenEach($betweenEach)
    {
        $this->betweenEach = $betweenEach;
    }

    /**
     * @param string $endEach
     */
    public function setEndEach($endEach)
    {
        $this->endEach = $endEach;
    }
}

