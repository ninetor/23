<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
	    'js/vendors/fancybox/jquery.fancybox.css',
        'css/style.css',
        'css/my.css',
    ];
    public $js = [
	    'js/antimat.js',
	    'js/interface.js',
	    'js/vendors/fancybox/jquery.fancybox.pack.js',
	    'js/vendors/mask/jquery.mask.min.js',
	    'js/forms.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
