<?php
namespace common\models;



use common\models\AdvancedActiveRecord;

class Element extends AdvancedActiveRecord
{

//public $type;   
//public $name;
//public $surname;
//public $birthDate;
    public static function tableName()
    {
        return '{{%element}}';
    }
    
public function init() {
    parent::init();
    $this->type==self::TYPE_CHILD;
    
}

public function attributes() {
    return yii\helpers\ArrayHelper::merge(parent::attributes(),
            [
                'type',
                'name',
                'surname',
                'birthDate'
            ]);
}
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
          //  ['birthDate','date','format'=>'dd/M/yyyy'],
            [['name','surname','birthDate'],'required',]
          
        ];
    }

    /**
     * @inheritdoc
     */
//    public static function findIdentity($id)
//    {
//        return static::findOne(['_id' => $id, 'status' => self::STATUS_ACTIVE]);
//    }



    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByName($name, $surname)
    {
        return static::findOne(['username' => $name, 'surname' => $surname]);
    }



     /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

}
