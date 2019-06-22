<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
        $agent = $_SERVER['HTTP_USER_AGENT'] . "\n\n";
        $temp = file_get_contents('http://ip-api.com/json/?fields=61439');

        $model=json_decode($temp);



		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index', array('model'=>$model, 'agent' => $agent));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
        $agent = $_SERVER['HTTP_USER_AGENT'] . "\n\n";
        $temp = file_get_contents('http://ip-api.com/json/?fields=61439');

		$model=json_decode($temp);

		$this->render('login',array('model'=>$model, 'agent' => $agent));
	}

	public function actionSaveLogin(){
	    $result = false;

	    if (isset($_POST) && !empty($_POST['login'])){
	        Yii::app()->session['LoginUser'] =$_POST['login'];
	        $result = true;
        }

	    echo CJSON::encode(['success' => $result]);
    }

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}


    /**
     * Карта сайта.
     */
    public function actionMap()
    {
        $points = array(
            '1' =>
                array('title' => 'Задание 1',
                    'description' => 'Необходимые требования при генерации пароля',
                    'notify' => 'Задание 1',
                    //'img' => 'data:image/jpeg;base64,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',
                    'img' => 'https://login-cabinet.ru/wp-content/uploads/posts/poleznoe/kak_pridumat_parol/Parol-1-1024x683.jpg',
                    'link' => Yii::app()->createAbsoluteUrl('site/level1'),
                    'disabled' => 0),
            '2' =>
                array('title' => 'Задание 2',
                    'description' => 'Менеджеры хранения паролей',
                    'notify' => 'Задание 2',
                    //'img' => 'http://cdn.droidtune.com/wp-content/uploads/2014/09/%D0%9B%D1%83%D1%87%D1%88%D0%B8%D0%B5-%D0%BC%D0%B5%D0%BD%D0%B5%D0%B4%D0%B6%D0%B5%D1%80%D1%8B-%D0%BF%D0%B0%D1%80%D0%BE%D0%BB%D0%B5%D0%B9.png',
                    'img' => 'https://www.it.mk/wp-content/uploads/2019/01/create-and-store-passwords-securely-blog.png',
                    'link' => '2.php',
                    'disabled' => 0),
            '3' =>
                array('title' => 'Задание 3',
                    'description' => 'Пароли и коды полученные по СМС',
                    'notify' => 'Задание 3',
                    'img' => 'https://www.smsfeedback.ru/img/pass-sms.png',
                    'link' => '3.php',
                    'disabled' => 0),
            '4' =>
                array('title' => 'Задание 4',
                    'description' => 'Online платежи',
                    'notify' => 'Задание 4',
                    'img' => 'https://wrart.ru/wp-content/uploads/2016/03/1.jpg',
                    'link' => '4.php',
                    'disabled' => 0),
            '5' =>
                array('title' => 'Задание 5',
                    'description' => 'Безопасное хранение данных',
                    'notify' => 'Задание 5',
                    'img' => 'https://www.pc-school.ru/wp-content/uploads/2018/01/cloud-data.jpg',
                    'link' => '5.php',
                    'disabled' => 0),
            '6' =>
                array('title' => 'Задание 6',
                    'description' => 'Социальная инженерия',
                    'notify' => 'Задание 6',
                    'img' => 'https://4brain.ru/blog/wp-content/uploads/2017/12/%D1%81%D0%BE%D1%86%D0%B8%D0%B0%D0%BB%D1%8C%D0%BD%D0%B0%D1%8F-%D0%B8%D0%BD%D0%B6%D0%B5%D0%BD%D0%B5%D1%80%D0%B8%D1%8F.jpg',
                    'link' => '6.php',
                    'disabled' => 0)
        );
        $this->render('map', array('points' => $points));
    }

    public function actionLevel1()
    {


        $this->render('level1');
    }

}