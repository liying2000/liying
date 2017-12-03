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

use app\models\Login;
use app\models\Leave;
use yii\data\Pagination;
use DfaFilter\SensitiveHelper;
/**
 * Site controller
 */

class LoginController extends Controller
{	
	//关闭CSRF攻击
	public $enableCsrfValidation = false;

	public function actionLogin(){
		return $this->render('login');
	}

	public function actionLogin_do(){
		$login_name = Yii::$app->request->post('login_name');
		$login_pwd = Yii::$app->request->post('login_pwd');

		$models = new Login();
		$res=$models->find()->where(['login_name'=>$login_name,'login_pwd'=>$login_pwd])->asArray()->one();
		if ($res) {
			Yii::$app->session['login_name']=$login_name;
			return $this->redirect(['login/add']);
		}else{
			echo "登录失败";
		}
		

	}

	public function actionAdd(){
		return $this->render('add');
	}

	public function actionAdd_do(){
		$data = Yii::$app->request->post();
		$models = new Leave();
		$models->leave_name = $data['leave_name'];
		$models->title = Yii::$app->session['login_name'];
		$models->leave_content = $data['leave_content'];
		$wordData = array(
		    '察象蚂',
		    '拆迁灭',
		    '车牌隐',
		    '成人电',
		    '成人卡通',
		    
		);
		$islegal = SensitiveHelper::init()->setTree($wordData)->islegal($models->leave_name);
		$models->leave_name = SensitiveHelper::init()->setTree($wordData)->replace($models->leave_name, '***');
		$data=$models->save();
		if ($data) {
			return $this->redirect(['login/show']);
		}else{
			echo '添加失败';
		}
	}

	public function actionShow(){
		$model = new Leave();
	    // 查询总数
	    $user_count = $model->find()->count();
	    $data['pages'] = new Pagination(['totalCount' => $user_count]);
	    // 设置每页显示多少条
	   $data['pages']->defaultPageSize = 2;
	   $user_list = $model->find()->offset($data['pages']->offset)->limit($data['pages']->limit)->asArray()->all();
  		 $data['pages']->params=array("tab"=>'all');
   		return $this->render('show',[
            'data' => $data,
            'res' => $user_list,
        ]);
		//$data=$model->find()->asArray()->all();	
		return $this->render('show');
	}

	public function actionDel(){
		$id= Yii::$app->request->get('id');
		$model = new Leave();
		$data=$model->find()->where(['id'=>$id])->one()->delete();
		if ($data) {
			return $this->redirect(['login/show']);
		}else{
			echo "删除失败";
		}

	}

	public function actionUpdate(){
		$id = Yii::$app->request->get('id');
		$model = new Leave();
		$data = $model->find()->where(['id'=>$id])->one();
		return $this->render('save',['data'=>$data]);
	}

	public function actionSave(){
		$data = Yii::$app->request->post();
		$model = new Leave();
		$res=$model->find()->where(['id'=>$data['id']])->one();
		$res->leave_name = $data['leave_name'];
		$res->leave_content = $data['leave_content'];
		if ($res->save()) {
			$this->redirect(['login/show']);
		}else{
			echo "修改失败";
		}


	}


	

}