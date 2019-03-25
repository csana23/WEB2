$(function () {
    // simple date mm/dd/yyyy format
    $.validator.addMethod('validDate', function (value, element) {
        return this.optional(element) || /([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))/.test(value);
    }, 'Please provide a date in the yyyy/mm/dd format');

    $.validator.addMethod('dateBefore', function (value, element, params) {
        // if end date is valid, validate it as well
        var end = $(params);
        if (!end.data('validation.running')) {
            $(element).data('validation.running', true);
            this.element(end);
            $(element).data('validation.running', false);
        }
        return this.optional(element) || this.optional(end[0]) || new Date(value) < new Date(end.val());

    }, 'Must be before corresponding end date');

    $.validator.addMethod('dateAfter', function (value, element, params) {
        // if start date is valid, validate it as well
        var start = $(params);
        if (!start.data('validation.running')) {
            $(element).data('validation.running', true);
            this.element(start);
            $(element).data('validation.running', false);
        }
        return this.optional(element) || this.optional(start[0]) || new Date(value) > new Date($(params).val());

    }, 'Must be after corresponding start date');
    $('#myform').validate({ // initialize the plugin
        rules: {
            from: { dateBefore: '#to', required: true },
            to: { dateAfter: '#from', required: true }
        }
        /*
        submitHandler: function (form) { 
            alert('valid form submitted'); 
            return false; 
        }*/
    });
});