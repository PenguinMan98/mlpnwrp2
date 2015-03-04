<?php

namespace app\controllers;

use app\models\User;

class UserController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    public function actionRegister()
    {
   		$model = new User();
    	
   		if ($model->load(\Yii::$app->request->post())) {
   			if ($model->validate()) {
   				// form inputs are valid, do something here
   				return;
   			}
   		}
    	
   		return $this->render('register', [
   			'model' => $model,
   		]);
    	 
    }

}
