(function($){
    $(document).ready(function(){

        // Logout Features
        $(document).on('click', '#logout_btn',  function(e){
            e.preventDefault();
            $('#logout_form').submit();
        });

        // Category Status
        $(document).on('click', 'input.cat_check', function(){

            let checked = $(this).attr('checked');
            let status_id = $(this).attr('status_id');

            if( checked == 'checked' ){
                $.ajax({
                    url : 'category/status-inactive/' + status_id,
                    success : function(data){
                        swal('Status Inactive successful');
                    }
                });
            }else {
                $.ajax({
                    url : 'category/status-active/' + status_id,
                    success : function(data){
                        swal('Status Active successful');
                    }
                });
            }

        });

        // Delete btn fix
        $(document).on('click','.delete-btn', function (e) {

            let conf = confirm('Are you sure?');
            if ( conf == true ){
                return true;
            }else {
                return false;
            }
        });

        // Category Edit
        $(document).on('click','.edit_cat', function (e) {
            e.preventDefault();
            // get id
            let id= $(this).attr('edit_id');
            //send ajax request
            $.ajax({
                url : 'category/' +id+ '/edit',
                success: function (data) {
                    $('#update_category_modal form input[name="name"]'). val(data.name);
                    $('#update_category_modal form input[name="edit_id"]'). val(data.id);
                }
            });
            // for modal show
            $('#update_category_modal').modal('show');
        });


    });
})(jQuery)

