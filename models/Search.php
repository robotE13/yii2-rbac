<?php

namespace dektrium\rbac\models;

/**
 * Description of Search
 *
 * @author Tartharia
 */
abstract class Search extends \yii\base\Model{
    
    /**
     * Имя элемента авторизации.
     * @var string
     */
    public $name;        
    
    /** @var string */
    public $description;
    
    /** @var string */
    public $rule_name;
    
    /**
     * Тип элемента авторизации.
     * @var int
     */
    protected $itemType;
    
    /**
     * @var \dektrium\rbac\components\DbManager|\dektrium\rbac\components\PhpManager
     */
    protected $manager;
    
    /**
     * @inheritdoc
     */
    public function __construct($itemType, $config = [])
    {
        parent::__construct($config);
        $this->manager = \Yii::$app->authManager;
        $this->itemType = $itemType;
    }
    
    public static function newFilter($itemType)
    {
        //\yii\helpers\VarDumper::dump(\Yii::$app->authManager->className());
        //\Yii::$app->end();
        
        switch (\Yii::$app->authManager->className()) {
            case 'dektrium\rbac\components\PhpManager':
                return new PhpSearch($itemType);

            default:
                throw new \yii\base\InvalidValueException(\Yii::t('system','Invalid AuthManager'));
        }
    }

    /**
     * 
     * @param array $params
     */    
    abstract public function search($params = []);
}