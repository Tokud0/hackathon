<?php

namespace app\controllers;

use app\models\Event;
use app\models\forms\ContactForm;
use app\models\forms\LoginForm;
use app\models\forms\ReviewForm;
use app\models\forms\SignUpForm;
use app\models\Review;
use app\models\User;
use Yii;
use yii\base\Exception;
use yii\db\Expression;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\Response;
use yii\web\UploadedFile;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $allEvents = Event::find()->all();
        shuffle($allEvents);
        $events = array_slice($allEvents, 0, 3);
        $allReviews = Review::find()->all();
        shuffle($allReviews);
        $reviews = array_slice($allReviews, 0, 3);
        return $this->render('index', [
            'reviews' => $reviews,
            'events'=> $events,
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * @throws Exception
     * @throws \yii\db\Exception
     */
    public function actionSignup(): mixed
    {
        $model = new SignUpForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }
        return $this->render('signup',[
            'model'=> $model,

        ]);
    }

    /**
     * @throws \yii\db\Exception
     */
    public function actionAddreview(): \yii\web\Response|string
    {
        $user = Yii::$app->user->identity;
        $model = new ReviewForm();
        if ($model->load(Yii::$app->request->post()) && $model->addReview()) {
            Yii::$app->session->setFlash('success', 'Отзыв успешно добавлен!');
            if ($user instanceof User) {
                $user->rewardForComment();
            }
            return $this->redirect(['site/review']);
        }
        return $this->render('addreview', [
            'model' => $model,
        ]);
    }
    public function actionReview()
    {
        $reviews = \app\models\Review::find()->all();

        return $this->render('review', [
            'reviews' => $reviews,]);
    }
    public function actionMap()
    {
        return $this->render('map');

    }

    public function actionEmergency() {
        return $this->render('emergency');
    }

    public function actionGuide() {
        return $this->render('guide');
    }
    public function actionBuyTicket()
    {
        $user = Yii::$app->user->identity;

        if ($user->buyBusTicket()) {
            $filePath = Yii::getAlias('@app/files/ticket.pdf');

            if (file_exists($filePath)) {
                return Yii::$app->response->sendFile($filePath, 'ticket.pdf');
            } else {
                Yii::$app->session->setFlash('error', 'Файл билета не найден.');
            }
        }

        return $this->redirect(['site/index']);
    }
    public function actionCoins(){
        return $this->render('coins');
    }

}

