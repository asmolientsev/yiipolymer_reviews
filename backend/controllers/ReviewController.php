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
	        'cors' => [
	        	'Access-Control-Expose-Headers' => ['X-Pagination-Current-Page', 'X-Pagination-Page-Count'],
	        	'Access-Control-Allow-Headers' => 'Access-Control-Expose-Headers',
	        	'Access-Control-Allow-Methods' => ['GET', 'POST', 'PUT', 'DELETE', 'HEAD', 'OPTIONS'],
	        	'Origin' => ['*'],
	        	'Access-Control-Request-Headers' => ['*'],
	        ]
	    ];
	    // $behaviors['corsFilter']['cors']['Access-Control-Expose-Headers'] = ['X-Pagination-Current-Page'];
		return $behaviors;
	}
}
?>