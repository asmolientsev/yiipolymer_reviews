<?php
namespace app\controllers;

use yii\rest\ActiveController;

class ReviewController extends ActiveController {
	
	public $modelClass = 'app\models\Review';

	public function behaviors(){
		$behaviors = parent::behaviors();
		
		$behaviors['contentNegotiator'] = [
			'class' => \yii\filters\contentNegotiator::className(),
			'formats' => [
				'application/json' => \yii\web\Response::FORMAT_JSON
			]
		];

		$behaviors['corsFilter'] = [
	        'class' => \yii\filters\Cors::className(),
	    ];

		return $behaviors;
	}
}
?>