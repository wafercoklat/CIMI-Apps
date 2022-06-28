(function($) {
    'use strict';
    $("#select").selectize({
        valueField: 'id',
        labelField: 'val',
        searchField: 'val',
        create: false,
        maxItems: 1,
    });

    $("#select2").selectize({
        valueField: 'id',
        labelField: 'val',
        searchField: 'val',
        create: false,
        maxItems: 1,
    });

    $("#origin").selectize({
        valueField: 'id',
        labelField: 'val',
        searchField: 'val',
        create: false,
        maxItems: 1,
    });

    $("#destinasi").selectize({
        valueField: 'id',
        labelField: 'val',
        searchField: 'val',
        create: false,
        maxItems: 1,
    });
})(jQuery);