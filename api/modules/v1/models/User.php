<?php

namespace api\modules\v1\models;
 
use yii\db\ActiveRecord;
/**
 * User Model
 *
 * @author BrainMobi
 */
class User extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }
 
    /**
     * We use the primary function because we don't use integer auto increment as a primary key.
     * @inheritdoc
     */
    public static function primaryKey()
    {
        return ['email'];
    }
 
    /**
     * To let Yii know what fields exist on the table.
     * Define rules for validation
     */
    public function rules()
    {
        return [
            [['username','email','firstName', 'lastName','country','address','zipcode'], 'required']
        ];
    }
}