<?php
/**
 * 
 */

namespace dektrium\rbac\components;

/**
 * Description of PhpManager
 *
 * @author Tartharia
 */
class PhpManager extends \yii\rbac\PhpManager implements ManagerInterface{
    
    public function getItem($name) {
        return parent::getItem($name);
    }
    
    public function getItems($type=null,$excludeItems=[]) {
        $items = [];

        foreach ($this->items as $name => $item) {
            /* @var $item Item */
            if ($item->type == $type && !in_array($item->name,$excludeItems)) {
                $items[$name] = $item;
            }
        }
        return $items;
    }
}
