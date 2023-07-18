define([
    'jquery',
    'mage/url'
], function ($, urlBuilder) {
    'use strict';

    return function (config, element) {
        $(element).submit(function (e) {
            e.preventDefault();
            if ($(element).validation() && $(element).validation('isValid') === true) {
                $.ajax({
                    type: 'POST',
                    url: urlBuilder.build('sitereview/ajax/save/'),
                    data: {
                        'review_title': $.trim($("#site-review-title").val()),
                        'review_text': $.trim($("#site-review-text").val()),
                        'pros': $.trim($("#site-pros").val()),
                        'cons': $.trim($("#site-cons").val())
                    },
                    dataType: 'json',
                    statusCode: {
                        200: function() {
                            $(element)[0].reset();
                        }
                    }
                });
            }
        });
    };
});
