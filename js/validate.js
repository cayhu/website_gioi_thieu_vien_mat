function validator(options) {
    function getParent(element, selector) {
        while (element.parentElement) {
            if (element.parentElement.matches(selector)) {
                return element.parentElement;
            }
            element = element.parentElement;
        }
    }
    var selectorRules = {};

    function validate(inputElement, rule) {
        var errorElement = inputElement.parentElement.querySelector('.form-message');
        var errorMessage;
        var rules = selectorRules[rule.select];
        for (var i = 0; i < rules.length; i++) {
            switch (inputElement.type) {
                case 'checkbox':
                case 'radio':
                    errorMessage = rules[i](
                        formElement.querySelector(rule.select + ':checked')
                    );
                    break;
                default:
                    errorMessage = rules[i](inputElement.value);
            }
            if (errorMessage)
                break;
        }
        if (errorMessage) {
            errorElement.innerText = errorMessage;
            inputElement.parentElement.classList.add('validate');
        } else {
            errorElement.innerText = "";
            inputElement.parentElement.classList.remove('validate');
        }
        return !errorMessage;
    }

    var formElement = document.querySelector(options.form);
    if (formElement) {
        formElement.onsubmit = function(e) {
            // e.preventDefault();
            var isFormValid = true;
            options.rules.forEach(function(rule) {
                var inputElement = formElement.querySelector(rule.select);
                var isValid = validate(inputElement, rule);
                if (!isValid) {
                    isFormValid = false;
                }
            });
            if (isFormValid) {
                if (typeof options.onSubmit === 'function') {
                    var formInputs = formElement.querySelectorAll('[name]');
                    var formValues = Array.from(formInputs).reduce(function(values, input) {
                        switch (input.type) {
                            case 'radio':
                                values[input.name] = formElement.querySelector('input["' + input.name + '"]:checked');
                                break;
                            case 'checkbox':
                                if (!input.matches(':checked')) {
                                    values[input.name] = "";
                                    return values;
                                }
                                if (!Array.isArray(values[input.name])) {
                                    values[input.name] = [];
                                }
                                values[input.name].push(input.value);
                                break;
                            case 'file':
                                values[input.name] = input.files;
                                break;
                            default:
                                values[input.name] = input.value;
                        }
                        return values;
                    }, {});
                    options.onSubmit(formValues);
                } else {
                    formElement.submit();
                }
            }
        }
        options.rules.forEach(function(rule) {
            if (Array.isArray(selectorRules[rule.select])) {
                selectorRules[rule.select].push(rule.test);
            } else {
                selectorRules[rule.select] = [rule.test];
            }

            var inputElement = formElement.querySelector(rule.select);
            if (inputElement) {
                inputElement.onblur = function() {
                    validate(inputElement, rule);
                }
                inputElement.oninput = function() {
                    var errorElement = inputElement.parentElement.querySelector('.form-message');
                    errorElement.innerText = "";
                    inputElement.parentElement.classList.remove('validate');
                }
            }
        });
    }
}




// isRequired
validator.isRequired = function(select, message) {
    return {
        select: select,
        test: function(value) {
            return value ? undefined : message || "Trường này bắt buộc";
        }
    };
}


// isEmail
validator.isEmail = function(select, message) {
    return {
        select: select,
        test: function(value) {
            var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            return regex.test(value) ? undefined : message || "This field must be email";
        }
    };
}

// Số điện thoại
validator.phone = function(select, message) {
    return {
        select: select,
        test: function(value) {
            var vnf_regex = /((032|033|034|035|036|037|038|039|070|079|077|076|078|083|084|085|081|082|056|058|059|012)+([0-9]{7})\b)/g;
            return vnf_regex.test(value) ? undefined : message || "Số điện thoại nhập không hợp lệ!";
        }
    };
}

// Mật khẩu
validator.minLength = function(select, min, max, message) {
    return {
        select: select,
        test: function(value) {
            return (value.length >= min && value.length <= max) ? undefined : message || `Enter at least ${min} to ${max} characters`;
        }
    };
}



// nhập lại mật khẩu
validator.passwordConfirm = function(select, confirm, message) {
    return {
        select: select,
        test: function(value) {
            return value === confirm() ? undefined : message || "This field must be email";
        }
    };
}