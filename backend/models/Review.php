<?php

namespace app\models;

use Yii;

/**
 * This is the model class for collection "reviews".
 *
 * @property \MongoId|string $_id
 * @property mixed $buyer_id
 * @property mixed $shop_id
 * @property mixed $bridge_id
 * @property mixed $task_id
 * @property mixed $product_ean
 * @property mixed $rating_quality
 * @property mixed $rating_price
 * @property mixed $rating_recommend
 * @property mixed $review
 * @property mixed $email
 * @property mixed $order_id
 * @property mixed $product_title
 * @property mixed $product_url
 * @property mixed $ip
 * @property mixed $is_confirmed
 * @property mixed $is_terms
 * @property mixed $is_thank
 * @property mixed $is_deleted
 * @property mixed $is_synced
 * @property mixed $is_bridge_product
 * @property mixed $change_sync
 * @property mixed $retention_sendings
 * @property mixed $synced_at
 * @property mixed $created_at
 * @property mixed $updated_at
 */
class Review extends \yii\mongodb\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function collectionName()
    {
        return 'reviews';
    }

    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return [
            '_id',
            'username',
            'product',
            'body',
            'created_at',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'product', 'body'], 'required'],
            [['created_at'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            '_id' => Yii::t('app', 'ID'),
            'buyer_id' => Yii::t('app', 'Buyer ID'),
            'shop_id' => Yii::t('app', 'Shop ID'),
            'bridge_id' => Yii::t('app', 'Bridge ID'),
            'task_id' => Yii::t('app', 'Task ID'),
            'product_ean' => Yii::t('app', 'Product Ean'),
            'rating_quality' => Yii::t('app', 'Quality'),
            'rating_price' => Yii::t('app', 'Price'),
            'rating_recommend' => Yii::t('app', 'Recommend'),
            'review' => Yii::t('app', 'Review'),
            'email' => Yii::t('app', 'Email'),
            'product_title' => Yii::t('app', 'Product Title'),
            'order_id' => Yii::t('app', 'Order Id'),
            'retention_sendings' => Yii::t('app','Retentions'),
            'ip' => Yii::t('app','IP'),
            'is_confirmed' => Yii::t('app', 'Is Confirmed'),
            'is_terms' => Yii::t('app', 'Is Terms'),
            'is_thank' => Yii::t('app', 'Is Thank You'),
            'is_deleted' => Yii::t('app', 'Is Deleted'),
            'is_synced' => Yii::t('app', 'Is Synced'),
            'is_bridge_product' => Yii::t('app','Is Bridge Product'),
            'synced_at' => Yii::t('app', 'Synced At'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    public function beforeSave($insert)
    {
        if ($this->isNewRecord){
            $this->created_at = new \MongoDB\BSON\UTCDateTime(time());
        }
        return true;
    }
 
}
