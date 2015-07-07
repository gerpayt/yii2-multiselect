<?php
namespace gerpayt\yii2_multiselect;

use Yii;
use yii\helpers\BaseHtml;
use yii\validators\Validator;

class MultiSelectValidator extends Validator
{
    public $compareAttribute;

    public $message;

    public $min = null;
    public $max = null;

    public $tooLess = '';
    public $tooMore = '';


    public function init()
    {
        parent::init();

    }


    public function validateAttribute($model, $attribute)
    {
        $value = (array) (BaseHtml::getAttributeValue($model, $attribute));

        $count = count(array_filter($value));

        if (isset($this->min) && $count < $this->min) {
            $this->addError($model, $attribute, $this->tooLess);
        }
        if (isset($this->max) && $count > $this->max) {
            $this->addError($model, $attribute, $this->tooMore);
        }
    }

    /**
     * @inheritdoc
     */
    public function clientValidateAttribute($model, $attribute, $view)
    {
        $id = BaseHtml::getInputId($model, $attribute);

        $options['id'] = $id;

        $options['min'] = $this->min;
        $options['tooLess'] = $this->tooLess;
        $options['max'] = $this->max;
        $options['tooMore'] = $this->tooMore;

        return 'yii.validation.multiselect(value, messages, ' . json_encode($options, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . ');';
    }
}
