<?php
/**
 * Created by PhpStorm.
 * User: Neff
 * Date: 06.02.2017
 * Time: 22:10
 */

namespace lesha724\bootstraptree;


use yii\web\AssetBundle;

class TreeViewAsset extends AssetBundle
{
    public static $customCss = null;

    public $sourcePath = '@bower/patternfly-bootstrap-treeview/dist';


    public $css = [
        'bootstrap-treeview.min.css'
    ];

    public $js = [
        'bootstrap-treeview.min.js'
    ];

    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];

    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
    }
}