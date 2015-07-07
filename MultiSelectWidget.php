<?php

namespace gerpayt\yii2_multiselect;

use yii\helpers\ArrayHelper;
use yii\helpers\BaseHtml;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\widgets\InputWidget;
use gerpayt\yii2_ueditor\UEditorAsset;

class MultiSelectWidget extends InputWidget
{

    public function run()
    {
        $this->view->registerAssetBundle(MultiSelectAsset::className());
        $options = $this->options;

        if (isset($options['id'])) {
            $id = $options['id'];
        } else {
            $id = BaseHtml::getInputId($this->model, $this->attribute);
        }

        if (isset($options['name'])) {
            $name = $options['name'];
        } elseif ($this->hasModel()) {
            $name = BaseHtml::getInputName($this->model, $this->attribute);
        } else {
            $name = $this->name;
        }

//        if (isset($options['value'])) {
//            $value = $options['value'];
//        } elseif ($this->hasModel()) {
//            $value = BaseHtml::getAttributeValue($this->model, $this->attribute);
//        } else {
//            $value = $this->value;
//        }

        $len = strlen($this->attribute);

        $widget = Html::beginTag('div', ['id' => $id, 'name' => $name]);


        foreach ($this->model as $k => $v) {
            if (substr($k,0,$len+1) == $this->attribute.'_') {
                $widget .= Html::activeCheckbox($this->model, $k, ['labelOptions'=>['class'=>'checkbox-inline']]);
            }
        }
        $widget .= Html::endTag('div');

        echo $widget;

    }
}
