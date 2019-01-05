(function(){
    if(!window.TN_Form) {
        window.TN_Form = {}; 
    }

    TN_Form.PlaceHolder = function (input, options, undefined) {
        if (this === TN_Form) throw new Error('TN_Form.PlaceHolder must be used with "new" keyword');

        options = options || {};

        var PLACE_HOLDER = 'placeholder',
            placeholder,
            ret,
            focusClass = options.focusClass === undefined ? 'focus' : options.focusClass,
            defaultClass = options.defaultClass === undefined ? 'form-default' : options.defaultClass;

        // create an input with no 'placeholder' attribute
        test_input = $('<input />');

        this.input = input = $(input);

        if (input && input.length) {

            // test whether browser support html5 placeholder attribute
            // if browser doesn't support, then we imitate it
            if (!(PLACE_HOLDER in test_input)) {

                // placeholder attribute has higher priority
                placeholder = $.trim((input.attr(PLACE_HOLDER) || options[PLACE_HOLDER] || ''));

                // else deal with attr value
            } else if (!input.attr(PLACE_HOLDER) && options[PLACE_HOLDER]) {
                input.attr(PLACE_HOLDER, options[PLACE_HOLDER]);
            }

            options = null;

            input.on({
                focus: function () {
                    var class_ = focusClass,
                        formerClass_ = defaultClass,
                        _placeholder = placeholder,
                        i = input;

                    class_ && i.addClass(class_);
                    formerClass_ && i.removeClass(formerClass_);
                    if ($.trim(i.val()) === _placeholder) i.val('');
                },

                dblclick: function (e) {
                    e && e.preventDefault && e.preventDefault();
                },

                blur: function () {
                    var i = input,
                        formerClass_ = defaultClass,
                        class_ = focusClass,
                        _placeholder = placeholder,
                        value = $.trim(i.val());

                    // 值为空，或者值为placeholder
                    if (!value || value === _placeholder) {
                        formerClass_ && i.addClass(formerClass_);
                        class_ && i.removeClass(class_);
                        _placeholder && i.val(_placeholder);
                    }
                }
            });

            input.blur && input.blur();
            input.trigger('blur');
        }


        ret = {
            hasValue: function (){
                var v = input.val();

                return v!=='' && v!==placeholder;
            },
            setPlaceHolder: function (v){
                !this.hasValue() && input.val(v);
                placeholder = v;
                input.attr('placeholder', v);
            },
            getValue: function () {
                var value = $.trim(input.val()),
                    _placeholder = placeholder;

                return _placeholder && value === _placeholder ? '' : value;
            }
        }
        return ret;
    };

}());

