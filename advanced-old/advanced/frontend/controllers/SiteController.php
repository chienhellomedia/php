<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\CustomerloginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\CustomerForm;
use frontend\models\ContactForm;
use backend\models\Customer;
use backend\models\Category;
use backend\models\Product;
use backend\models\Blog;
use backend\models\Supplier;
use backend\models\Contact;
use backend\models\Subscribe;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
        'access' => [
        'class' => AccessControl::className(),
        'only' => ['logout', 'signup'],
        'rules' => [
        [
        'actions' => ['signup'],
        'allow' => true,
        'roles' => ['?'],
        ],
        [
        'actions' => ['logout'],
        'allow' => true,
        'roles' => ['@'],
        ],
        ],
        ],
        'verbs' => [
        'class' => VerbFilter::className(),
        'actions' => [
        'logout' => ['post'],
        ],
        ],
        ];
    }

    /**
     * @inheritdoc
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
        'auth' => [
        'class' => 'yii\authclient\AuthAction',
        'successCallback' => [$this, 'onAuthSuccess'],
        ],
        ];
    }
    //

    public function onAuthSuccess($client)
    {
        (new AuthHandler($client))->handle();
    }
    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $category = new Category();
        $cateAll = $category->getAllCateRoot();

        $product = new Product();        
        $data = $product->getProNew();
        $featured = $product->getProFeatured();
        $bestseller = $product->getProSeller();

        $blog = new Blog;
        $blog = $blog->getAllBlog();
        
        $supplier = new Supplier();
        $supp = $supplier->getAllsupplier();
        
        return $this->render('index', 
            [
                'cateAll' => $cateAll,
                'data' => $data,
                'featured' => $featured,
                'bestseller' => $bestseller,
                'blog' => $blog,
                'supp' => $supp,                        
            ]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {        
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        
        $model = new CustomerloginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
                ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    // public function actionContact()
    // {
    //     $model = new Contact();
    //     if ($model->load(Yii::$app->request->post())) {
    //        $model->created_at = time();
    //        $model->updated_at = time();
    //        if ($model->save()) {
    //                if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
    //                 Yii::$app->session->setFlash('success', 'Cảm ơn bạn đã gửi mail cho chúng tôi.');
    //                 return $this->refresh();
    //             } else {
    //                 Yii::$app->session->setFlash('error', 'There was an error sending your message.');
    //             }
    //        }else{
    //             $model->getErrors();
    //        } 
    //     } else {
    //         return $this->render('contact', [
    //             'model' => $model,
    //         ]);
    //     }
    // }
    public function actionContact()
    {
        $model = new ContactForm();
        $contact = new Contact();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            
            $post = Yii::$app->request->post()["ContactForm"];
            $contact->name = $post['name'];
            $contact->email = $post['email'];
            $contact->subject = $post['subject'];
            $contact->body = $post['body'];
            $contact->created_at = time();
            $contact->updated_at = time();

            if ($contact->save()) {
                if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                    Yii::$app->session->setFlash('success', 'Cảm ơn bạn đã liên hệ với chúng tôi. Chúng tôi sẽ phẩn hồi lại cho bạn ngay khi có thể.');
                } else {
                    Yii::$app->session->setFlash('error', 'Đã xảy ra lỗi khi gửi.');
                }
                return $this->refresh();
            } else {
                echo '<pre>';
                print_r($contact->getErrors());
                echo '</pre>';
            }
            
        } else {
            return $this->render('contact', [
                'model' => $model,
                ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionSubcribe()
    {
        $model = new Subscribe();
        if (Yii::$app->request->post()) {
            $model->email = Yii::$app->request->post()["emailsub"];
            $model->created_at = time();
            if ($model->save()) {
              Yii::$app->session->setFlash('success', 'Đăng ký thành công.');                  
          } else {
            Yii::$app->session->setFlash('danger', 'Đăng ký không thành công.'); 
        }
    }
    return $this->goHome();
}
    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new CustomerForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
            ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
            ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
            ]);
    }
}
