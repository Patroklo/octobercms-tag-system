+function ($) {
    "use strict";

    var TagFormField = function () {

        this.$selectField = $('[data-control="tag"] select');

        $(this.$selectField).select2({
            tags: true,
            tokenSeparators: [',', ' '],
            allowClear: $('[data-control="tag"] select').data('allow-clear')
        });
    };

    $(document).ready(function () {

        // There is a single instance of the form builder. All operations
        // are stateless, so instance properties or DOM references are not needed.
        $.oc.tagFormField = new TagFormField();
    })

}(window.jQuery);