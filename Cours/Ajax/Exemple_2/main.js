let refreshButton = $('#load');

/*refreshButton.click(function () {
    $.ajax({
        method: "GET",
        url: "lastNews.php",
        dataType: "html",
        success: function (data) {
            $('#lastNews').html(data);
        }
    });
});*/

$('#load').click(function () {
    $.get("lastNews.php", function (data) {
        $('#lastNews').html(data);
    });
});