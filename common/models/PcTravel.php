<?php

namespace common\models;

use common\utils\DateTimeHelper;
use Yii;

/**
 * This is the model class for table "pc_travel".
 *
 * @property integer $id
 * @property string $title
 * @property string $cost
 * @property integer $car_models      车型 1-''无车'',2-''轿车'',3-''SUV''
 * @property string $place_departure
 * @property string $destination
 * @property string $departure_time
 * @property string $arrival_time
 * @property string $contact_name
 * @property string $contact_mobile
 * @property string $remark
 * @property int    $is_audit
 * @property int    $is_delete
 * @property string $create_time
 * @property string $last_update_time
 * @property string $create_by
 */
class PcTravel extends \yii\db\ActiveRecord
{
    const CAR_MODELS_NO = 1;
    const CAR_MODELS_SMAll = 2;
    const CAR_MODELS_SUV = 3;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pc_travel';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['car_models'], 'integer'],

            ['title', 'required', 'message' => '标题不能为空'],
            ['place_departure', 'required', 'message' => '出发地不能为空'],
            ['destination', 'required', 'message' => '目的地不能为空'],
            ['departure_time', 'required', 'message' => '出发日期不能为空'],
            ['contact_name', 'required', 'message' => '联系人不能为空'],
            //[['cost', 'car_models'], 'safe'],
            [['title', 'cost', 'place_departure', 'destination', 'contact_name', 'contact_mobile'], 'string', 'max' => 64],
            [['remark'], 'string', 'max' => 255],
        ];
    }

    public function beforeSave($insert)
    {
        parent::beforeSave($insert);
        if ($insert) {
            $this->create_time = DateTimeHelper::now();
        }
        return true;
    }

    public function getCreateByModel()
    {
        return $this->hasOne(UserFront::className(),['id' => 'create_by']);
    }

    public function getCarModels()
    {
        switch ($this->car_models) {
            case self::CAR_MODELS_NO:
                return '无车';
                break;
            case self::CAR_MODELS_SMAll:
                return '轿车';
                break;
            case self::CAR_MODELS_SUV:
                return 'SUV';
                break;
            default:
                return '其他';
                break;
        }
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '标题',
            'cost' => '费用',
            'car_models' => '车型',
            'place_departure' => '出发地',
            'destination' => '目的地',
            'departure_time' => '出发时间',
            'arrival_time' => '预计到达时间',
            'contact_name' => '联系人',
            'contact_mobile' => '联系电话',
            'remark' => '其他信息',
            'create_time' => '发布时间',
            'last_update_time' => '最后更新时间',
            'create_by' => '创建人',
        ];
    }
}
