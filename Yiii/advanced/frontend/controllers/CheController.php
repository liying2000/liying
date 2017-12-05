<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class CheController extends Controller
{
    public $enableCsrfValidation = false;
    public $layout = false;
    public function actionRegister()

    {
        $arr=Yii::$app->request->get();
        $chang=count($arr);
        if($chang==2)
        {


            $sql="SELECT * FROM tian WHERE id= $arr[id]";
            $query = Yii::$app->db->createCommand($sql)->queryOne();

            return  $this->render('register',['data'=>$query]);
       die;

        }


        return  $this->render('register');
    }
    public  function  actionTian(){
        $arr=Yii::$app->request->post();

        if(!empty($arr['id']))
        {

        }

        $arr=Yii::$app->request->post();
        $sql= "INSERT INTO tian (shou, mi, mim) VALUES ('$arr[shou]','$arr[mi]','$arr[mim]')";
        $res=Yii::$app->db->createCommand($sql)->execute();
        $id=Yii::$app->db->getLastInsertID();
         if($res)
         {
             $data['id']=$id;
             return  $this->render('register_2',['data'=>$data]);
         }
    }
    public  function  actionTian2(){
        $arr=Yii::$app->request->get();
        $chang=count($arr);
       if($chang==2)
       {
           $sql="SELECT * FROM tian WHERE id= $arr[id]";
           $query = Yii::$app->db->createCommand($sql)->queryOne();
           if($query)
           {
               return  $this->render('register_2',['data'=>$query]);
           }
       }

        $arr=Yii::$app->request->post();
        $sql="UPDATE tian SET username='$arr[username]', sheng='$arr[sheng]', gong='$arr[gong]' WHERE (id='$arr[id]')";
        $res = Yii::$app->db->createCommand($sql)->execute();
        if($res)
        {

            return  $this->render('register_3',['data'=>$arr['id']]);
        }
    }



}