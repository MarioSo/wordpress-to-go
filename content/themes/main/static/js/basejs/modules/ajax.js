define(['vendor/domready', 'jquery'], function(domReady, $) {

    var module = {

        ajaxCall: function(action, ajaxData, responseFunction) {

            ajaxData.action = action;

            $.ajax({
                type: 'POST',
                data: ajaxData

            }).done(function(response) {
                responseFunction(response);

            }).fail(function(xhr, ajaxOptions, thrownError) {
                console.error(thrownError);
            });

        }
    };
    return module;
});
