<?php

namespace app\controllers;

use app\models\User;
use app\lib\Curl;

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
   				// form inputs are valid
          $post = \Yii::$app->request->post();
          $reCaptchaResponse = $post['g-recaptcha-response'];

          // check with Google
          try{
            $curl = new Curl( 'https://www.google.com/recaptcha/api/siteverify',
              array(
                'secret' => '6LeDUQITAAAAAH-eh_-ncn0NVSoAoSHgvn6nvqMv',
                'response' => $reCaptchaResponse,
                'remoteip' => $_SERVER['REMOTE_ADDR']
              )
            );
            $resp = json_decode($curl->curlRequest());

            if($resp->success){ // reCaptcha Successful!
              $model->save();
              return $this->redirect(['site/welcome']);
            }
          }catch( \Exception $e ){
            if( strpos($e->getMessage(), 'SQLSTATE[23000]') !== false )
            {
              echo "Duplicate Entry<br>";
              \Yii::$app->session->setFlash('error', "That username already exists. Please choose another one.");
              return $this->redirect(['user/register']);
            }else{
              die( "||" . $e->getMessage() . "||" );
            }
          }
   				return;
   			}
   		}
    	
   		return $this->render('register', [
   			'model' => $model,
        'renderCaptcha' => true,
   		]);
    	 
    }

}
