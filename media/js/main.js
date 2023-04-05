$(document).ready(function () {
    $('table.table tbody').on('click', 'a.table-link.delete', function (event) {
        event.stopPropagation();
        tc = $(this);
        var cf = confirm("Are you sure!");
        if (cf == true) {
            url = tc.attr('href');
            id_Product = tc.attr('data-product-id');
            path_Product = tc.attr('data-path');
            var element = $('[data-path^="' + path_Product + '"]');
            $.ajax({
                url: url,
                data: {
                    id: id_Product,
                    path_Product: path_Product,
                },
                type: "POST",
            })
                .done(function (json) {
                    element.parent().parent().remove();
                    // tc.parent().parent().remove();
                })
                .fail(function (xhr, status, errorThrown) {
                    alert("Sorry, there was a problem!");
                    console.log("Error: " + errorThrown);
                    console.log("Status: " + status);
                    console.dir(xhr);
                })
        }
        return false;
    });
});