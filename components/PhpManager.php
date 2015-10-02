<?php
/**
 * 
 */

namespace dektrium\rbac\components;

use yii\rbac\Item;

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
            if (isset($type)) {
                if($item->type == $type && !in_array($item->name,$excludeItems))
                {
                    $items[$name] = $item;
                }
            }elseif (!in_array($item->name,$excludeItems)) {
                $items[$name] = $item;
            }
        }
        return $items;
    }
    
    public function getItemsArray($type=null,$excludeItems = [])
    {
        $result=[];
        $items = $this->getItems($type, $excludeItems);
        /* @var $item Item */
        foreach ($items as $item) {
            $result[]=['name'=>$item->name,'rule_name'=>$item->ruleName,'description'=>$item->description];
        }
        return $result;
    }
    /**
     * @todo Реализовать метод. Пока возвращает переданный в него ИД пользователя
     * @param type $userId
     * @return type
     */
    public function getItemsByUser($userId)
    {
        return $userId;
    }
}
