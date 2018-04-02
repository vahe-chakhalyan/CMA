$(document).ready(function() {
    $(".delete-user").click(function() {
        let _this = $(this);
        let user_id = _this.attr("data-user-id");
        if (confirm("Are you sure you want to delete this user?") == true) {
            $("#user_delete_form").attr("action", "/users/" + user_id);
            $("#user_delete_form").submit();
        }
    });

});