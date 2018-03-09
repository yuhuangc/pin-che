<?php
namespace frontend\models;

use common\models\UserFront;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupFrontForm extends Model
{
    public $username;
    public $phone;
    public $type;
    public $email;
    public $signature;
    public $password;
    public $re_password;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type'], 'integer'],

            ['username', 'trim'],
            ['username', 'required', 'message' => '用户名不能为空'],
            ['username', 'unique', 'targetClass' => '\common\models\UserFront', 'message' => '用户名已经存在.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['phone', 'trim'],
            ['phone', 'required', 'message' => '手机号不能为空'],
            ['phone', 'string', 'max' => 11],
            ['phone', 'unique', 'targetClass' => '\common\models\UserFront', 'message' => '手机号已经存在.'],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\UserFront', 'message' => '邮箱已经存在.'],

            ['signature', 'trim'],
            ['signature', 'string', 'max' => 255],

            ['password', 'required', 'message' => '密码不能为空'],
            ['password', 'string', 'min' => 6, 'message' => '密码至少6位'],

            ['re_password', 'required', 'message' => '确认密码不能为空'],
            ['re_password', 'string', 'min' => 6],

            ['re_password', 'compare', 'compareAttribute' => 'password', 'message' => '两次输入密码不一致'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return UserFront|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new UserFront();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->phone = $this->phone;
        $user->type = $this->type;
        $user->signature = $this->signature;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        return $user->save() ? $user : null;
    }
}
