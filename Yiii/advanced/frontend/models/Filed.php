<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "filed".
 *
 * @property integer $filed_id
 * @property string $filed_name
 * @property string $filed_value
 * @property string $filed_type
 * @property string $filed_wood1
 * @property string $filed_wood2
 * @property integer $filed_if
 * @property string $filed_rule
 * @property string $filed_min
 * @property string $filed_max
 */
class Filed extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'filed';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['filed_if'], 'integer'],
            [['filed_name', 'filed_value', 'filed_type', 'filed_rule', 'filed_min', 'filed_max'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'filed_id' => 'Filed ID',
            'filed_name' => 'Filed Name',
            'filed_value' => 'Filed Value',
            'filed_type' => 'Filed Type',
            'filed_if' => 'Filed If',
            'filed_rule' => 'Filed Rule',
            'filed_min' => 'Filed Min',
            'filed_max' => 'Filed Max',
        ];
    }
}
