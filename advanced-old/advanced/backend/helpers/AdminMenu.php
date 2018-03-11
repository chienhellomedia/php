<?php 
namespace backend\helpers;

use Yii;
use yii\helpers\Html;
use backend\modules\rbac\components\MenuHelper;

class AdminMenu
{
    public $menus;
    public $module;
    public $controller;
    public $route;
    public function generator($route)
    {
        $this->menus = MenuHelper::getAssignedMenu(Yii::$app->user->id);
        $this->route = $route;
        $route_array = explode('/',$this->route);
        $this->module = $route_array[0];
        $this->controller = $route_array[0].'/'.$route_array[1];
        ?>
         <ul class="nav nav-list">
            <?php 
            if(count($this->menus) > 0) :
            foreach($this->menus as $menu) : 
                $menu_route_array = explode('/',ltrim($menu['url'][0],'/'));
                $childs = isset($menu['items']) ? $menu['items'] : false;
                $active = ($menu_route_array[0] == $this->module) ? 'active open' : '';
                $submenu = ($childs) ? ' submenu' : '';
                $arrow = ($childs) ? ' <b class="arrow fa fa-angle-down"></b>' : '';
                $dropdown = ($childs) ? ' dropdown-toggle' : '';
                $url = ($childs) ? '#' : $menu['url'];
                $label = Html::tag('i', '', ['class' => 'menu-icon '.$menu['icon']]) .
                Html::tag('span', Html::encode($menu['label']), ['class' => 'menu-text']).$arrow;
                 
            ?>
                <li class="<?php echo $active;?>">
                <?php echo Html::a($label, $url,['class'=>$dropdown]);
                    if($childs) : 
                ?>
                    <ul class="submenu">
                        <?php foreach($childs as $child) : 
                        $url_array = explode('/',ltrim($child['url'][0],'/'));
                        $childurl = $url_array[0].'/'.$url_array[1];

                         $cactive = ($childurl == $this->controller) ? ' active' : '';
                        ?>
                            <li class="<?php echo $cactive;?>">
                            <?php 
                                $clabel = Html::tag('i', '', ['class' => 'menu-icon '.$child['icon']]) .
                                Html::tag('span', Html::encode($child['label']));
                                echo Html::a($clabel, $child['url']
                            ); ?>
                           </li>
                       <?php endforeach;?>
                    </ul>
                    <?php endif; ?>
                </li>
           <?php endforeach; endif;?>
        </ul>
    <?php
    }
}
?>