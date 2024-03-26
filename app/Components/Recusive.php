<?php
namespace App\Components;

class Recusive
{
    private $data;
    private $categoryselect = '';
    public function __construct($data)
    {
        $this->data = $data;
    }
    public function categoryRecusive($id = 0, $text = '')
    {

        foreach ($this->data as $value) {
            if ($value['parent_id'] == $id) {
                $this->categoryselect .= "<option>" . $text . $value['name'] . "</option>";
                $this->categoryRecusive($value['id'], $text . '--');
            }
        }
        return $this->categoryselect;
    }
}
