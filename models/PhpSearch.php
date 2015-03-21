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
    
    public function search($params = array()) {
        \yii\helpers\VarDumper::dump($this->manager->getItems($this->itemType));
        //\Yii::$app->end();
        return new \yii\data\ArrayDataProvider(['allModels'=>$this->manager->getItems($this->itemType)]);
    }
}
