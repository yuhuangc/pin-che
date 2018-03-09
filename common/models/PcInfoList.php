<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pc_info_list".
 *
 * @property integer $id
 * @property integer $type
 * @property string $start_time
 * @property string $form_address
 * @property string $to_address
 * @property string $cost
 * @property integer $seat_num
 * @property string $car_type
 * @property string $ways
 * @property string $contact_name
 * @property string $contact_phone
 * @property string $remark
 * @property integer $is_top
 * @property integer $is_approve
 * @property string $create_time
 * @property string $create_by
 */
class PcInfoList extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pc_info_list';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'start_time', 'form_address', 'to_address', 'create_time'], 'required'],
            [['type', 'seat_num', 'is_top', 'is_approve'], 'integer'],
            [['start_time', 'create_time'], 'safe'],
            [['form_address', 'to_address'], 'string', 'max' => 40],
            [['cost', 'car_type', 'contact_name', 'contact_phone', 'create_by'], 'string', 'max' => 20],
            [['ways'], 'string', 'max' => 50],
            [['remark'], 'string', 'max' => 400],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'start_time' => 'Start Time',
            'form_address' => 'Form Address',
            'to_address' => 'To Address',
            'cost' => 'Cost',
            'seat_num' => 'Seat Num',
            'car_type' => 'Car Type',
            'ways' => 'Ways',
            'contact_name' => 'Contact Name',
            'contact_phone' => 'Contact Phone',
            'remark' => 'Remark',
            'is_top' => 'Is Top',
            'is_approve' => 'Is Approve',
            'create_time' => 'Create Time',
            'create_by' => 'Create By',
        ];
    }

}
