<?php

namespace frontend\controllers;
use backend\models\comments;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use Yii;

class CommentsController extends \yii\web\Controller
{
	public function actionIndex()
	{
		return $this->render('index');
	}
	public function actionCreate()
	{
		$model = new comments();
		// var_dump($_POST); die;
		if (Yii::$app->request->isAjax) {
			if($_POST["_csrf-frontend"] != NULL) {

				$model->table = $_POST["Comments"]["table"];
				$model->id_comment = $_POST["Comments"]['slug']; 
				$model->parent = $_POST["Comments"]['parent']; 
				$model->content = $_POST["Comments"]['content']; 
				$model->cus_id = $_POST["Comments"]['cus_id']; 
				// var_dump($model->cus_id); die;
				$model->readcomment = 0;
				$model->status = 10;
				$model->created_at = date('Y-m-d H:i:s');
				$model->updated_at = date('Y-m-d H:i:s');
				$model->save();
				// 	return $this->render();
				// }
				var_dump($model->getErrors()); 

			}
			
		}
	}

	public function actionShowmore() {
		$model = new comments();
		$request = Yii::$app->request;
		if ($request->isAjax) {
			$page = Yii::$app->request->get()['page'];
			$table = Yii::$app->request->get()['table'];
			$slug = Yii::$app->request->get()['slug'];
			$cus_id = Yii::$app->request->get()['cus_id'];
			$data = comments::find()->where(['table'=>$table, 'id_comment'=>$slug,'parent'=>0])->OrderBy('id DESC')->limit(3)->offset($page*3)->all();
			if($data) : foreach ($data as $key => $value) :
				echo '<div class="media">
				<div class="media-left">
				<img src="'.Yii::$app->params['homepath'].'uploads/user.png" class="media-object" style="width:45px">
				</div>
				<div class="media-body">
				<h4 class="media-heading">'.$value->comment[0]->fullname.' &nbsp;<small><i>Ngày đăng '.$value->created_at.'</i></small></h4>
				<p class="mr0">'.$value->content.'</p>
				<p class="mr0"><span class="reply"><b>Trả lời</b></span>&nbsp;<span class="number-like">0</span>&nbsp;<span class="like-comment"><i class="fa fa-thumbs-o-up fa-lg" aria-hidden="true"></i></span> &nbsp;<span class="dislike-comment"><i class="fa fa-thumbs-o-down fa-lg" aria-hidden="true"></i></span></p>';

        // <!-- Nested media object -->
				$child = new Comments();
				$childComment = $child->getChildComment($value->id);
				if(!empty($childComment)) :
					$count = $child->getChildCount($value->id);
					echo '<a href="javascript:void(0)" title="Xem thêm bình luận khác" class="show-more-reply" data-key="'.($key+4).'"><i class="fa fa-reply" aria-hidden="true"></i> có '.$count.' câu trả lời khác</a>';

					foreach ($childComment as $kson => $childcom) :

						echo    '<div class="media">
						<div class="media-left">
						<img src="'.Yii::$app->params['homepath'].'uploads/user.png" class="media-object" style="width:45px">
						</div>
						<div class="media-body">
						<h4 class="media-heading">'.$childcom->comment[0]->fullname.'&nbsp;<small><i>Ngày đăng '.$childcom->created_at.'</i></small></h4>
						<p class="mr0">'.$childcom->content.'</p>
						<p class="mr0"><span class="reply" ><b>Trả lời</b></span>&nbsp;<span class="number-like">0</span>&nbsp;<span class="like-comment"><i class="fa fa-thumbs-o-up fa-lg" aria-hidden="true"></i></span> &nbsp;<span class="dislike-comment"><i class="fa fa-thumbs-o-down fa-lg" aria-hidden="true"></i></span></p>
						</div>
						</div>';

					endforeach; endif;
          // <!-- Nested media object -->
					echo '<div class="clearfix">';

					$form = ActiveForm::begin([
               // 'id' => 'comment-form',
						'action' => Url::to(['/comments/create']),
						'options' => [
							'class' => 'hide comment-form form-comment-child',

						],
					]);
					echo '<input type="hidden" name="Comments[table]" value="'.$table.'">';
					echo '<input type="hidden" name="Comments[slug]" value="'.$slug.'">';
					echo '<input type="hidden" name="Comments[cus_id]" value="'.$cus_id.'" class="userComment">';
					echo '<input type="hidden" name="Comments[parent]" value="'.$value->id.'">';
					echo $form->field($model, 'content')->textarea(['rows'=>5, 'class'=>'contentFocus form-control']);
					echo '<div class="col-sm-5 pull-right">
					<div class="form-group">
					<div class="col-sm-4 pa0">
					<button type="reset" class="btn btn-danger btn-block btn-destroy br0">Hủy</button>
					</div>
					<div class="col-sm-8">'.Html::submitButton('Đăng Bình luận', ['class' => 'btn btn-primary btn-block br0 submit-comment']).'</div>
					</div>
					</div>';
					ActiveForm::end();
					echo '</div>

					</div>
					</div>';
				endforeach; endif;

			}
		}
	}
