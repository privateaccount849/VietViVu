$(document).on( "click", ".pagination a", function(e) {
    var pageValue = $(this).attr("data-page");
 
    $.ajax({
        url: '/ajax_pagination.php?limit=25&page='+pageValue,
        type: "GET",
        success: function(data){
            $("#ajax_wrapper").html(data); 
        }
    });
 
    e.preventDefault();
});