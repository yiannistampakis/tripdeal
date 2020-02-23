<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $uid
 * @property string $username
 * @property string $email
 * @property string $password
 * @property int $status
 * @property bool $contact_email
 * @property bool $contact_phone
 * @property string $created
 * @property string $updated
 *
 * @property Message[] $messages
 * @property Message[] $messages0
 * @property PhoneNumber[] $phoneNumbers
 * @property Trip[] $trips
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uid', 'username', 'email', 'password'], 'required'],
            [['status'], 'integer'],
            [['contact_email', 'contact_phone'], 'boolean'],
            [['created', 'updated'], 'safe'],
            [['uid', 'password'], 'string', 'max' => 60],
            [['username'], 'string', 'max' => 45],
            [['email'], 'string', 'max' => 255],
            [['email'], 'unique'],
            [['email'], 'email']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'uid' => Yii::t('app', 'Uid'),
            'username' => Yii::t('app', 'Username'),
            'email' => Yii::t('app', 'Email'),
            'password' => Yii::t('app', 'Password'),
            'status' => Yii::t('app', 'Status'),
            'contact_email' => Yii::t('app', 'Contact Email'),
            'contact_phone' => Yii::t('app', 'Contact Phone'),
            'created' => Yii::t('app', 'Created'),
            'updated' => Yii::t('app', 'Updated'),
        ];
    }

    public function beforeValidate()
    {
        if ($this->isNewRecord){
            $this->uid = Yii::$app->getSecurity()->generatePasswordHash(date('YmdHis').rand(1, 999999));
        }
        return parent::beforeValidate();
    }

    public function beforeSave($insert)
    {
        if ($this->isNewRecord){
            $this->password = Yii::$app->getSecurity()->generatePasswordHash($this->password);
        }
        return true;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFromMessages()
    {
        return $this->hasMany(Message::className(), ['from_user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getToMessages()
    {
        return $this->hasMany(Message::className(), ['to_user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhoneNumbers()
    {
        return $this->hasMany(PhoneNumber::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrips()
    {
        return $this->hasMany(Trip::className(), ['user_id' => 'id']);
    }

        /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        $res = (new \yii\db\Query())
            ->select(['*'])
            ->from('user')
            ->where(['username' => $username])
           ->all();


        if (strcasecmp($res[0]['username'], $username) === 0) {
            $user  = [
                'id' => $res[0]['id'],
                'uid' => $res[0]['uid'],
                'username' => $res[0]['username'],
                'email' => $res[0]['email'],
                'password' => $res[0]['password'],
                'status' => $res[0]['status'],
                'contact_email' => $res[0]['contact_email'],
                'created' => $res[0]['created'],
                'updated' => $res[0]['updated'],
            ];
              
            return new static($user);
        }

        return null;
    }

}
