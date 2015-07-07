<?php
namespace gerpayt\yii2_multiselect;

use yii\web\AssetBundle;

/**
 * This asset bundle provides the javascript files for client validation.
 *
 * @author Anushan Easwaramoorthy <EAnushan@hotmail.com>
 * @since 2.0
 */
class MultiSelectAsset extends AssetBundle
{
    public $sourcePath = '@vendor/gerpayt/yii2-multiselect/assets';
    public $js = [
        'js/multiselect.validation.js',
    ];
    public $css = [
        'css/multiselect.css',
    ];
    public $depends = [
        'yii\validators\ValidationAsset',

    ];
}
