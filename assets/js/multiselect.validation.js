
$.extend(yii.validation, (function ($) {
    var pub = {
        multiselect: function (value, messages, options) {
            if (options.skipOnEmpty && yii.validation.isEmpty(value)) {
                return;
            }

            var count = $('#' + options.id +' input:checkbox:checked').length;

            if(options.min && count<options.min) {
                yii.validation.addMessage(messages, options.tooLess, value);
            }
            if(options.max && count>options.max) {
                yii.validation.addMessage(messages, options.tooMore, value);
            }
        }
    };

    return pub;
})(jQuery));
