<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace dektrium\rbac\models;

/**
 * Description of PhpSearch
 *
 * @author Tartharia
 */
class PhpSearch extends Search{
    
        /** @inheritdoc */
    public function scenarios()
    {
        return [
            'default' => ['name', 'rule_name'],
        ];
    }
    
    public function search($params = array()) 
    {
        
        return new \yii\data\ArrayDataProvider(['allModels'=>$this->manager->getItemsArray($this->itemType)]);
    }
}
