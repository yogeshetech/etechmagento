
$(function() {
    $(".link-reorder").click(function() {
        var element = $(this);
        var del_id = element.attr("id");
        var info = 'id=' + del_id;

        var baseUrl = window.location.href;
        var parent = $(this).parents('tr');

        if (confirm("Are you sure you want to delete this?"))
        {
            $.ajax({
                type: "POST",
                url: baseUrl + "index",
                data: info,
                success: function() {

                    parent.slideUp(300, function() {
                        parent.remove();
                    });

                }
            });


        }
        return false;


    });
});
