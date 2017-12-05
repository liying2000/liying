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

use app\models\Filed;
use DfaFilter\SensitiveHelper;
/**
 * Demo controller
 */


class PlanController extends Controller
{
	   //关闭CSRF攻击
	public $enableCsrfValidation = false;

    /**
     * @add
     */
    public $layout = false;
	public function actionAdd(){
		 return $this->render('add');
	}

	public function actionAdd_do(){
		$data = Yii::$app->request->post();
		$models = new Filed();
		$models->filed_name = $data['filed_name'];
		$models->filed_value = $data['filed_value'];
		$models->filed_type = $data['filed_type'];
		$models->filed_if = isset($data['filed_if'])?$data['filed_if']:'0';
		$models->filed_rule = $data['filed_rule'];
		$models->filed_min = $data['filed_min'];
		$models->filed_max = $data['filed_max'];
		$data = $models->save();
		if ($data) {
			$this->redirect(['plan/index']);
		}else{
			echo "添加失败";
		}

	}

	public function actionIndex(){
		$models = new Filed();
		$data = $models->find()->asArray()->all();
		return $this->render('index',['data'=>$data]);
	}

	public function actionDel(){
		$filed_id = Yii::$app->request->get('filed_id');
		$model = new Filed();
		$data = $model->find()->where(['filed_id'=>$filed_id])->one()->delete();
		if ($data) {
			$this->redirect(['plan/index']);
		}else{
			echo "删除失败";
		}	
	}

	public function actionUpdate(){
		$filed_id = Yii::$app->request->get('filed_id');
		$model = new Filed();
		$data = $model->find()->where(['filed_id'=>$filed_id])->asArray()->one();
		return $this->render('save',['data'=>$data]);
	}

	public function actionSave(){
		$data = Yii::$app->request->post();
		$model = new Filed();
		$res=$model->find()->where(['filed_id'=>$data['filed_id']])->one();
		$res->filed_name = $data['filed_name'];
		$res->filed_value = $data['filed_value'];
		$res->filed_type = $data['filed_type'];
		$res->filed_if =isset($data['filed_if'])?$data['filed_if']:'0';
		$res->filed_rule = $data['filed_rule'];
		$res->filed_min = $data['filed_min'];
		$res->filed_max = $data['filed_max'];
		$data = $res->save();
		if ($data) {
			$this->redirect(['plan/index']);
		}else{
			echo "修改失败";
		}
	}


}