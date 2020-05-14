jQuery( function($) {
    function dynamicSearch() {
        var input, filter, row, item, match, i;
        input = document.getElementById("dynamic-search");
        filter = input.value.toLowerCase();
        row = document.getElementById("service-row");
        item = row.getElementsByClassName("service-col");
        for (i = 0; i < item.length; i++) {
            match = $(item[i]).attr('target');
            if (match.toLowerCase().indexOf(filter) > -1) {
                item[i].style.display = "";
            } else {
                item[i].style.display = "none";
            }
        }
    }

    function dynamicSearchChild() {
        var input, filter, row, item, match, i;
        input = document.getElementById("dynamic-search-child");
        filter = input.value.toLowerCase();
        item = document.getElementsByClassName("child-service-row");
        for (i = 0; i < item.length; i++) {
            match = $(item[i]).attr('target');
            if (match.toLowerCase().indexOf(filter) > -1) {
                item[i].style.display = "";
            } else {
                item[i].style.display = "none";
            }
        }
    }

    $('input#dynamic-search').on('keyup', function() {
        dynamicSearch();
    });
    $('input#dynamic-search-child').on('keyup', function() {
        dynamicSearchChild();
    });
});
