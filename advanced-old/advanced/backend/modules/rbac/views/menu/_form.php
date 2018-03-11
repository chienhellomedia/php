<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\modules\rbac\models\Menu;
use yii\helpers\Json;
use backend\modules\rbac\AutocompleteAsset;

/* @var $this yii\web\View */
/* @var $model backend\modules\rbac\models\Menu */
/* @var $form yii\widgets\ActiveForm */
AutocompleteAsset::register($this);
$opts = Json::htmlEncode([
    'menus' => Menu::getMenuSource(),
    'routes' => Menu::getSavedRoutes(),
    ]);
$this->registerJs("var _opts = $opts;");
$this->registerJs($this->render('_script.js'));
?>

<div class="menu-form">
    <?php $form = ActiveForm::begin(); ?>
    <?php echo Html::activeHiddenInput($model, 'parent', ['id' => 'parent_id']); ?>
    <div class="row">
        <div class="col-sm-6">
            <?php echo $form->field($model, 'name')->textInput(['maxlength' => 128]) ?>

            <?php echo $form->field($model, 'parent_name')->textInput(['id' => 'parent_name']) ?>

            <?php echo $form->field($model, 'route')->textInput(['id' => 'route']) ?>
        </div>
        <div class="col-sm-6">
            <div class="row">
                <div class="col-sm-6">
                    <?php echo $form->field($model, 'order')->input('number') ?>
                </div>
                <div class="col-sm-6">
                    <?php echo $form->field($model, 'icon')->textInput(['id'=>'select-icon']) ?>
                </div>
            </div>
            <?php echo $form->field($model, 'data')->textarea(['rows' => 4]) ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo
        Html::submitButton($model->isNewRecord ? Yii::t('rbac-admin', 'Create') : Yii::t('rbac-admin', 'Update'), ['class' => $model->isNewRecord
            ? 'btn btn-success' : 'btn btn-primary'])
            ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
    <div class="modal fade" id="modal-icon">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Modal title</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <h3 class="header smaller lighter blue">
                                369 Scalable FontAwesome Icons
                                <small>
                                    <a href="http://fontawesome.io/icons/" target="_blank">
                                        (see all icons
                                        <i class="ace-icon fa fa-external-link"></i>)
                                    </a>
                                </small>
                            </h3>
                        </div>

                        <div class="col-xs-6 col-sm-3">
                            <ul class="list-unstyled">
                                <li>
                                    <i class="ace-icon fa fa-adjust"></i>
                                    fa-adjust
                                </li>

                                <li>
                                    <i class="ace-icon fa fa-asterisk"></i>
                                    fa-asterisk
                                </li>

                                <li>
                                    <i class="ace-icon fa fa-ban"></i>
                                    fa-ban
                                </li>

                                <li>
                                    <i class="ace-icon fa fa-bar-chart-o"></i>
                                    fa-bar-chart-o
                                </li>

                                <li>
                                    <i class="ace-icon fa fa-barcode"></i>
                                    fa-barcode
                                </li>

                                <li>
                                    <i class="ace-icon fa fa-flask"></i>
                                    fa-flask
                                </li>

                                <li>
                                    <i class="ace-icon fa fa-beer"></i>
                                    fa-beer
                                </li>

                                <li>
                                    <i class="ace-icon fa fa-bell-o"></i>
                                    fa-bell-o
                                </li>

                                <li>
                                    <i class="ace-icon fa fa-bell"></i>
                                    fa-bell
                                </li>

                                <li>
                                    <i class="ace-icon fa fa-bolt"></i>
                                    fa-bolt
                                </li>

                                <li>
                                    <i class="ace-icon fa fa-book"></i>
                                    fa-book
                                </li>

                                <li>
                                    <i class="ace-icon fa fa-bookmark"></i>
                                    fa-bookmark
                                </li>

                                <li>
                                    <i class="ace-icon fa fa-bookmark-o"></i>
                                    fa-bookmark-o
                                </li>

                                <li>
                                    <i class="ace-icon fa fa-briefcase"></i>
                                    fa-briefcase
                                </li>

                                <li>
                                    <i class="ace-icon fa fa-bullhorn"></i>
                                    fa-bullhorn
                                </li>

                                <li>
                                    <i class="ace-icon fa fa-calendar"></i>
                                    fa-calendar
                                </li>

                                <li>
                                    <i class="ace-icon fa fa-camera"></i>
                                    fa-camera
                                </li>

                                <li>
                                    <i class="ace-icon fa fa-camera-retro"></i>
                                    fa-camera-retro
                                </li>

                                <li>
                                    <i class="ace-icon fa fa-certificate"></i>
                                    fa-certificate
                                </li>
                            </ul>
                        </div>

                        <div class="col-xs-6 col-sm-3">
                            <ul class="list-unstyled">
                                <li>
                                    <i class="ace-icon fa fa-check-square-o"></i>
                                    fa-check-square-o
                                </li>

                                <li>
                                    <i class="ace-icon fa fa-square-o"></i>
                                    fa-square-o
                                </li>

                                <li>
                                    <i class="ace-icon fa fa-circle"></i>
                                    fa-circle
                                </li>

                                <li>
                                    <i class="ace-icon fa fa-circle-o"></i>
                                    fa-circle-o
                                </li>

                                <li>
                                    <i class="ace-icon fa fa-cloud"></i>
                                    fa-cloud
                                </li>

                                <li>
                                    <i class="ace-icon fa fa-cloud-download"></i>
                                    fa-cloud-download
                                </li>

                                <li>
                                    <i class="ace-icon fa fa-cloud-upload"></i>
                                    fa-cloud-upload
                                </li>

                                <li>
                                    <i class="ace-icon fa fa-coffee"></i>
                                    fa-coffee
                                </li>

                                <li>
                                    <i class="ace-icon fa fa-cog"></i>
                                    fa-cog
                                </li>

                                <li>
                                    <i class="ace-icon fa fa-cogs"></i>
                                    fa-cogs
                                </li>

                                <li>
                                    <i class="ace-icon fa fa-comment"></i>
                                    fa-comment
                                </li>

                                <li>
                                    <i class="ace-icon fa fa-comment-o"></i>
                                    fa-comment-o
                                </li>

                                <li>
                                    <i class="ace-icon fa fa-comments"></i>
                                    fa-comments
                                </li>

                                <li>
                                    <i class="ace-icon fa fa-comments-o"></i>
                                    fa-comments-o
                                </li>

                                <li>
                                    <i class="ace-icon fa fa-credit-card"></i>
                                    fa-credit-card
                                </li>

                                <li>
                                    <i class="ace-icon fa fa-tachometer"></i>
                                    fa-tachometer
                                </li>

                                <li>
                                    <i class="ace-icon fa fa-desktop"></i>
                                    fa-desktop
                                </li>

                                <li>
                                    <i class="ace-icon fa fa-arrow-circle-o-down"></i>
                                    fa-arrow-circle-o-down
                                </li>

                                <li>
                                    <i class="ace-icon fa fa-download"></i>
                                    fa-download
                                </li>
                            </ul>
                        </div>

                        <div class="col-xs-6 col-sm-3">
                            <ul class="list-unstyled">
                                <li>
                                    <i class="ace-icon fa fa-pencil-square-o"></i>
                                    fa-pencil-square-o
                                </li>

                                <li>
                                    <i class="ace-icon fa fa-envelope"></i>
                                    fa-envelope
                                </li>

                                <li>
                                    <i class="ace-icon fa fa-envelope-o"></i>
                                    fa-envelope-o
                                </li>

                                <li>
                                    <i class="ace-icon fa fa-exchange"></i>
                                    fa-exchange
                                </li>

                                <li>
                                    <i class="ace-icon fa fa-exclamation-circle"></i>
                                    fa-exclamation-circle
                                </li>

                                <li>
                                    <i class="ace-icon fa fa-external-link"></i>
                                    fa-external-link
                                </li>

                                <li>
                                    <i class="ace-icon fa fa-eye-slash"></i>
                                    fa-eye-slash
                                </li>

                                <li>
                                    <i class="ace-icon fa fa-eye"></i>
                                    fa-eye
                                </li>

                                <li>
                                    <i class="ace-icon fa fa-video-camera"></i>
                                    fa-video-camera
                                </li>

                                <li>
                                    <i class="ace-icon fa fa-fighter-jet"></i>
                                    fa-fighter-jet
                                </li>

                                <li>
                                    <i class="ace-icon fa fa-film"></i>
                                    fa-film
                                </li>

                                <li>
                                    <i class="ace-icon fa fa-filter"></i>
                                    fa-filter
                                </li>

                                <li>
                                    <i class="ace-icon fa fa-fire"></i>
                                    fa-fire
                                </li>

                                <li>
                                    <i class="ace-icon fa fa-flag"></i>
                                    fa-flag
                                </li>

                                <li>
                                    <i class="ace-icon fa fa-folder"></i>
                                    fa-folder
                                </li>

                                <li>
                                    <i class="ace-icon fa fa-folder-open"></i>
                                    fa-folder-open
                                </li>

                                <li>
                                    <i class="ace-icon fa fa-folder-o"></i>
                                    fa-folder-o
                                </li>

                                <li>
                                    <i class="ace-icon fa fa-folder-open-o"></i>
                                    fa-folder-open-o
                                </li>

                                <li>
                                    <i class="ace-icon fa fa-cutlery"></i>
                                    fa-cutlery
                                </li>
                            </ul>
                        </div>

                        <div class="col-xs-6 col-sm-3">
                            <ul class="list-unstyled">
                                <li>
                                    <i class="ace-icon fa fa-gift"></i>
                                    fa-gift
                                </li>

                                <li>
                                    <i class="ace-icon fa fa-glass"></i>
                                    fa-glass
                                </li>

                                <li>
                                    <i class="ace-icon fa fa-globe"></i>
                                    fa-globe
                                </li>

                                <li>
                                    <i class="ace-icon fa fa-users"></i>
                                    fa-users
                                </li>

                                <li>
                                    <i class="ace-icon fa fa-hdd-o"></i>
                                    fa-hdd-o
                                </li>

                                <li>
                                    <i class="ace-icon fa fa-headphones"></i>
                                    fa-headphones
                                </li>

                                <li>
                                    <i class="ace-icon fa fa-heart"></i>
                                    fa-heart
                                </li>

                                <li>
                                    <i class="ace-icon fa fa-heart-o"></i>
                                    fa-heart-o
                                </li>

                                <li>
                                    <i class="ace-icon fa fa-home"></i>
                                    fa-home
                                </li>

                                <li>
                                    <i class="ace-icon fa fa-inbox"></i>
                                    fa-inbox
                                </li>

                                <li>
                                    <i class="ace-icon fa fa-info-circle"></i>
                                    fa-info-circle
                                </li>

                                <li>
                                    <i class="ace-icon fa fa-key"></i>
                                    fa-key
                                </li>

                                <li>
                                    <i class="ace-icon fa fa-leaf"></i>
                                    fa-leaf
                                </li>

                                <li>
                                    <i class="ace-icon fa fa-laptop"></i>
                                    fa-laptop
                                </li>

                                <li>
                                    <i class="ace-icon fa fa-gavel"></i>
                                    fa-gavel
                                </li>

                                <li>
                                    <i class="ace-icon fa fa-lemon-o"></i>
                                    fa-lemon-o
                                </li>

                                <li>
                                    <i class="ace-icon fa fa-lightbulb-o"></i>
                                    fa-lightbulb-o
                                </li>

                                <li>
                                    <i class="ace-icon fa fa-lock"></i>
                                    fa-lock
                                </li>

                                <li>
                                    <i class="ace-icon fa fa-unlock"></i>
                                    fa-unlock
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <h3 class="header smaller lighter blue">
                                200 Scalable Glyphicons
                                <small>
                                    <a href="http://getbootstrap.com/components/#glyphicons" target="_blank">
                                        (see all icons
                                        <i class="ace-icon fa fa-external-link"></i>)
                                    </a>
                                </small>
                            </h3>
                        </div>

                        <div class="col-xs-6 col-sm-3">
                            <ul class="list-unstyled">
                                <li>
                                    <i class="ace-icon glyphicon glyphicon-asterisk"></i>
                                    glyphicon-asterisk
                                </li>

                                <li>
                                    <i class="ace-icon glyphicon glyphicon-plus"></i>
                                    glyphicon-plus
                                </li>

                                <li>
                                    <i class="ace-icon glyphicon glyphicon-euro"></i>
                                    glyphicon-euro
                                </li>

                                <li>
                                    <i class="ace-icon glyphicon glyphicon-minus"></i>
                                    glyphicon-minus
                                </li>

                                <li>
                                    <i class="ace-icon glyphicon glyphicon-cloud"></i>
                                    glyphicon-cloud
                                </li>

                                <li>
                                    <i class="ace-icon glyphicon glyphicon-envelope"></i>
                                    glyphicon-envelope
                                </li>

                                <li>
                                    <i class="ace-icon glyphicon glyphicon-pencil"></i>
                                    glyphicon-pencil
                                </li>

                                <li>
                                    <i class="ace-icon glyphicon glyphicon-glass"></i>
                                    glyphicon-glass
                                </li>

                                <li>
                                    <i class="ace-icon glyphicon glyphicon-music"></i>
                                    glyphicon-music
                                </li>

                                <li>
                                    <i class="ace-icon glyphicon glyphicon-search"></i>
                                    glyphicon-search
                                </li>

                                <li>
                                    <i class="ace-icon glyphicon glyphicon-heart"></i>
                                    glyphicon-heart
                                </li>

                                <li>
                                    <i class="ace-icon glyphicon glyphicon-star"></i>
                                    glyphicon-star
                                </li>

                                <li>
                                    <i class="ace-icon glyphicon glyphicon-star"></i>
                                    glyphicon-star-empty
                                </li>

                                <li>
                                    <i class="ace-icon glyphicon glyphicon-user"></i>
                                    glyphicon-user
                                </li>

                                <li>
                                    <i class="ace-icon glyphicon glyphicon-film"></i>
                                    glyphicon-film
                                </li>

                                <li>
                                    <i class="ace-icon glyphicon glyphicon-th"></i>
                                    glyphicon-th-large
                                </li>

                                <li>
                                    <i class="ace-icon glyphicon glyphicon-th"></i>
                                    glyphicon-th
                                </li>

                                <li>
                                    <i class="ace-icon glyphicon glyphicon-th"></i>
                                    glyphicon-th-list
                                </li>

                                <li>
                                    <i class="ace-icon glyphicon glyphicon-ok"></i>
                                    glyphicon-ok
                                </li>
                            </ul>
                        </div>

                        <div class="col-xs-6 col-sm-3">
                            <ul class="list-unstyled">
                                <li>
                                    <i class="ace-icon glyphicon glyphicon-remove"></i>
                                    glyphicon-remove
                                </li>

                                <li>
                                    <i class="ace-icon glyphicon glyphicon-zoom-in"></i>
                                    glyphicon-zoom-in
                                </li>

                                <li>
                                    <i class="ace-icon glyphicon glyphicon-zoom-out"></i>
                                    glyphicon-zoom-out
                                </li>

                                <li>
                                    <i class="ace-icon glyphicon glyphicon-off"></i>
                                    glyphicon-off
                                </li>

                                <li>
                                    <i class="ace-icon glyphicon glyphicon-signal"></i>
                                    glyphicon-signal
                                </li>

                                <li>
                                    <i class="ace-icon glyphicon glyphicon-cog"></i>
                                    glyphicon-cog
                                </li>

                                <li>
                                    <i class="ace-icon glyphicon glyphicon-trash"></i>
                                    glyphicon-trash
                                </li>

                                <li>
                                    <i class="ace-icon glyphicon glyphicon-home"></i>
                                    glyphicon-home
                                </li>

                                <li>
                                    <i class="ace-icon glyphicon glyphicon-file"></i>
                                    glyphicon-file
                                </li>

                                <li>
                                    <i class="ace-icon glyphicon glyphicon-time"></i>
                                    glyphicon-time
                                </li>

                                <li>
                                    <i class="ace-icon glyphicon glyphicon-road"></i>
                                    glyphicon-road
                                </li>

                                <li>
                                    <i class="ace-icon glyphicon glyphicon-download"></i>
                                    glyphicon-download-alt
                                </li>

                                <li>
                                    <i class="ace-icon glyphicon glyphicon-download"></i>
                                    glyphicon-download
                                </li>

                                <li>
                                    <i class="ace-icon glyphicon glyphicon-upload"></i>
                                    glyphicon-upload
                                </li>

                                <li>
                                    <i class="ace-icon glyphicon glyphicon-inbox"></i>
                                    glyphicon-inbox
                                </li>

                                <li>
                                    <i class="ace-icon glyphicon glyphicon-play"></i>
                                    glyphicon-play-circle
                                </li>

                                <li>
                                    <i class="ace-icon glyphicon glyphicon-repeat"></i>
                                    glyphicon-repeat
                                </li>

                                <li>
                                    <i class="ace-icon glyphicon glyphicon-refresh"></i>
                                    glyphicon-refresh
                                </li>

                                <li>
                                    <i class="ace-icon glyphicon glyphicon-list"></i>
                                    glyphicon-list-alt
                                </li>
                            </ul>
                        </div>

                        <div class="col-xs-6 col-sm-3">
                            <ul class="list-unstyled">
                                <li>
                                    <i class="ace-icon glyphicon glyphicon-lock"></i>
                                    glyphicon-lock
                                </li>

                                <li>
                                    <i class="ace-icon glyphicon glyphicon-flag"></i>
                                    glyphicon-flag
                                </li>

                                <li>
                                    <i class="ace-icon glyphicon glyphicon-headphones"></i>
                                    glyphicon-headphones
                                </li>

                                <li>
                                    <i class="ace-icon glyphicon glyphicon-volume-off"></i>
                                    glyphicon-volume-off
                                </li>

                                <li>
                                    <i class="ace-icon glyphicon glyphicon-volume-down"></i>
                                    glyphicon-volume-down
                                </li>

                                <li>
                                    <i class="ace-icon glyphicon glyphicon-volume-up"></i>
                                    glyphicon-volume-up
                                </li>

                                <li>
                                    <i class="ace-icon glyphicon glyphicon-qrcode"></i>
                                    glyphicon-qrcode
                                </li>

                                <li>
                                    <i class="ace-icon glyphicon glyphicon-barcode"></i>
                                    glyphicon-barcode
                                </li>

                                <li>
                                    <i class="ace-icon glyphicon glyphicon-tag"></i>
                                    glyphicon-tag
                                </li>

                                <li>
                                    <i class="ace-icon glyphicon glyphicon-tags"></i>
                                    glyphicon-tags
                                </li>

                                <li>
                                    <i class="ace-icon glyphicon glyphicon-book"></i>
                                    glyphicon-book
                                </li>

                                <li>
                                    <i class="ace-icon glyphicon glyphicon-bookmark"></i>
                                    glyphicon-bookmark
                                </li>

                                <li>
                                    <i class="ace-icon glyphicon glyphicon-print"></i>
                                    glyphicon-print
                                </li>

                                <li>
                                    <i class="ace-icon glyphicon glyphicon-camera"></i>
                                    glyphicon-camera
                                </li>

                                <li>
                                    <i class="ace-icon glyphicon glyphicon-font"></i>
                                    glyphicon-font
                                </li>

                                <li>
                                    <i class="ace-icon glyphicon glyphicon-bold"></i>
                                    glyphicon-bold
                                </li>

                                <li>
                                    <i class="ace-icon glyphicon glyphicon-italic"></i>
                                    glyphicon-italic
                                </li>

                                <li>
                                    <i class="ace-icon glyphicon glyphicon-text-height"></i>
                                    glyphicon-text-height
                                </li>

                                <li>
                                    <i class="ace-icon glyphicon glyphicon-text-width"></i>
                                    glyphicon-text-width
                                </li>
                            </ul>
                        </div>

                        <div class="col-xs-6 col-sm-3">
                            <ul class="list-unstyled">
                                <li>
                                    <i class="ace-icon glyphicon glyphicon-align-left"></i>
                                    glyphicon-align-left
                                </li>

                                <li>
                                    <i class="ace-icon glyphicon glyphicon-align-center"></i>
                                    glyphicon-align-center
                                </li>

                                <li>
                                    <i class="ace-icon glyphicon glyphicon-align-right"></i>
                                    glyphicon-align-right
                                </li>

                                <li>
                                    <i class="ace-icon glyphicon glyphicon-align-justify"></i>
                                    glyphicon-align-justify
                                </li>

                                <li>
                                    <i class="ace-icon glyphicon glyphicon-list"></i>
                                    glyphicon-list
                                </li>

                                <li>
                                    <i class="ace-icon glyphicon glyphicon-indent-left"></i>
                                    glyphicon-indent-left
                                </li>

                                <li>
                                    <i class="ace-icon glyphicon glyphicon-indent-right"></i>
                                    glyphicon-indent-right
                                </li>

                                <li>
                                    <i class="ace-icon glyphicon glyphicon-facetime-video"></i>
                                    glyphicon-facetime-video
                                </li>

                                <li>
                                    <i class="ace-icon glyphicon glyphicon-picture"></i>
                                    glyphicon-picture
                                </li>

                                <li>
                                    <i class="ace-icon glyphicon glyphicon-map-marker"></i>
                                    glyphicon-map-marker
                                </li>

                                <li>
                                    <i class="ace-icon glyphicon glyphicon-adjust"></i>
                                    glyphicon-adjust
                                </li>

                                <li>
                                    <i class="ace-icon glyphicon glyphicon-tint"></i>
                                    glyphicon-tint
                                </li>

                                <li>
                                    <i class="ace-icon glyphicon glyphicon-edit"></i>
                                    glyphicon-edit
                                </li>

                                <li>
                                    <i class="ace-icon glyphicon glyphicon-share"></i>
                                    glyphicon-share
                                </li>

                                <li>
                                    <i class="ace-icon glyphicon glyphicon-check"></i>
                                    glyphicon-check
                                </li>

                                <li>
                                    <i class="ace-icon glyphicon glyphicon-move"></i>
                                    glyphicon-move
                                </li>

                                <li>
                                    <i class="ace-icon glyphicon glyphicon-step-backward"></i>
                                    glyphicon-step-backward
                                </li>

                                <li>
                                    <i class="ace-icon glyphicon glyphicon-fast-backward"></i>
                                    glyphicon-fast-backward
                                </li>

                                <li>
                                    <i class="ace-icon glyphicon glyphicon-backward"></i>
                                    glyphicon-backward
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>