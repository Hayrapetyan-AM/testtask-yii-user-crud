<?php 

namespace app\controllers;

use yii\rest\ActiveController;
use app\models\UserApi;
use Yii;

class UserController extends ActiveController
{
    public $modelClass = 'app\models\UserApi';

    public function actionLogin()
    {
        $request = Yii::$app->request->post();
        
        $user = UserApi::findOne(['email' => $request['email']]);
        if ($user && Yii::$app->security->validatePassword($request['password'], $user->password)) {
            
            $accessToken = Yii::$app->security->generateRandomString();
            
            $user->accessToken = $accessToken;
            $user->password = $request['password'];
            $user->save(false); 
            
            return [
                'message' => 'Login successful',
                'accessToken' => $accessToken
            ];
        }

        return ['message' => 'Invalid email or password'];
    }

    public function actionLogout()
    {
        $request = Yii::$app->request->post();
        $token = $request['accessToken'];

        $user = UserApi::findOne(['accessToken' => $token]);

        if ($user) {
            $user->accessToken = null;
            $user->save(false); // Save without validation

            return ['message' => 'Logout successful'];
        }

        return ['message' => 'Invalid token'];
    }

}
 