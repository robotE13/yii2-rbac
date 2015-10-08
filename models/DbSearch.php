<?php
/**
 * 
 */

namespace dektrium\rbac\models;

use yii\data\ArrayDataProvider;
use yii\db\Query;

/**
 * @author Dmitry Erofeev <dmeroff@gmail.com>
 * @author Evgenii Dudal <wolfstrace@gmail.com>
 */
class DbSearch extends Search
{    
    /** @inheritdoc */
    public function scenarios()
    {
        return [
            'default' => ['name', 'description', 'rule_name'],
        ];
    }
    
    /**
     * @param array $params
     * @return ActiveDataProvider
     */
    public function search($params = [])
    {
        $dataProvider = \Yii::createObject(ArrayDataProvider::className());
        
        $query = (new Query)->select(['name', 'description', 'rule_name'])
                ->andWhere(['type' => $this->itemType])
                ->from($this->manager->itemTable);
        
        if ($this->load($params) && $this->validate()) {
            $query->andFilterWhere(['like', 'name', $this->name])
                ->andFilterWhere(['like', 'description', $this->description])
                ->andFilterWhere(['like', 'rule_name', $this->rule_name]);
        }
        
        $dataProvider->allModels = $query->all();
        
        return $dataProvider;
    }
}