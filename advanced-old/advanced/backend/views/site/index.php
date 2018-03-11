<?php

/* @var $this yii\web\View */
use yii\helpers\Url;
$this->title = 'Trang chủ';
$this->params['breadcrumbs'][] = '';
?>
 <a href="<?php echo Url::to(['/DefaultController/index']) ?>">module</a>
        <div class="row">
          <div class="col-md-3">
            <div class="widget-small primary"><i class="icon fa fa-users fa-3x"></i>
              <div class="info">
                <h4>Users</h4>
                <p><b>5</b></p>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="widget-small info"><i class="icon fa fa-thumbs-o-up fa-3x"></i>
              <div class="info">
                <h4>Likes</h4>
                <p><b>25</b></p>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="widget-small warning"><i class="icon fa fa-files-o fa-3x"></i>
              <div class="info">
                <h4>Uploades</h4>
                <p><b>10</b></p>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="widget-small danger"><i class="icon fa fa-star fa-3x"></i>
              <div class="info">
                <h4>Stars</h4>
                <p><b>500</b></p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3">
            <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
              <div class="info">
                <h4>Users</h4>
                <p><b>5</b></p>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="widget-small info coloured-icon"><i class="icon fa fa-thumbs-o-up fa-3x"></i>
              <div class="info">
                <h4>Likes</h4>
                <p><b>25</b></p>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="widget-small warning coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
              <div class="info">
                <h4>Uploades</h4>
                <p><b>10</b></p>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="widget-small danger coloured-icon"><i class="icon fa fa-star fa-3x"></i>
              <div class="info">
                <h4>Stars</h4>
                <p><b>500</b></p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <h3 class="card-title">Chat</h3>
              <div class="messanger">
                <div class="messages">
                  <div class="message"><img src="https://s3.amazonaws.com/uifaces/faces/twitter/tonypeterson/48.jpg">
                    <p class="info">Hello there!<br>Good Morning</p>
                  </div>
                  <div class="message me"><img src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg">
                    <p class="info">Hi<br>Good Morning</p>
                  </div>
                  <div class="message"><img src="https://s3.amazonaws.com/uifaces/faces/twitter/tonypeterson/48.jpg">
                    <p class="info">How are you?</p>
                  </div>
                  <div class="message me"><img src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg">
                    <p class="info">I'm Fine.</p>
                  </div>
                </div>
                <div class="sender">
                  <input type="text" placeholder="Send Message">
                  <button class="btn btn-primary" type="button"><i class="fa fa-lg fa-fw fa-paper-plane"></i></button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card">
              <h3 class="card-title">Vector Map</h3>
              <div class="card-body">
                <div id="demo-map" style="height: 400px;"></div>
              </div>
            </div>
          </div>
        </div>
            
