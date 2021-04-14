(function($) {
    $(document).ready(function() {
        // CK EDITOR USE
        CKEDITOR.replace('post_editor');

        // Select 2
        $('.post_tag_select').select2();

        // Selectize
        // $('.post_tag_select').selectize({
        //     plugins: ['remove_button'],
        //     delimiter: ',',
        //     persist: false,
        //     create: function(input) {
        //         return {
        //             value: input,
        //             text: input
        //         }
        //     }
        // });

        // Logout Features
        $(document).on('click', '#logout_btn', function(e) {
            e.preventDefault();
            $('#logout_form').submit();
        });

        /******************************************************************
         *                    Post Category work START                    *
         ******************************************************************/
        // Post Category Status
        $(document).on('click', 'input.cat_check', function() {

            let checked = $(this).attr('checked');
            let status_id = $(this).attr('status_id');

            if (checked == 'checked') {
                $.ajax({
                    url: 'category/status-inactive/' + status_id,
                    success: function(data) {
                        swal('Status Inactive successful');
                    }
                });
            } else {
                $.ajax({
                    url: 'category/status-active/' + status_id,
                    success: function(data) {
                        swal('Status Active successful');
                    }
                });
            }

        });

        // Post Category Delete btn fix
        $(document).on('click', '.delete-btn', function(e) {

            let conf = confirm('Are you sure?');
            if (conf == true) {
                return true;
            } else {
                return false;
            }
        });

        // Post Category Edit
        $(document).on('click', '.edit_cat', function(e) {
            e.preventDefault();
            // get id
            let id = $(this).attr('edit_id');
            //send ajax request
            $.ajax({
                url: 'category/' + id + '/edit',
                success: function(data) {
                    $('#update_category_modal form input[name="name"]').val(data.name);
                    $('#update_category_modal form input[name="edit_id"]').val(data.id);
                }
            });
            // for modal show
            $('#update_category_modal').modal('show');
        });

        /******************************************************************
         *                    Post Category work END                      *
         ******************************************************************/

        /******************************************************************
         *                    Post Tag Work START                         *
         ******************************************************************/
        // Post Tag Status
        $(document).on('click', 'input.cat_check', function() {

            let checked = $(this).attr('checked');
            let status_id = $(this).attr('status_id');

            if (checked == 'checked') {
                $.ajax({
                    url: 'tag/status-inactive/' + status_id,
                    success: function(data) {
                        swal('Status Inactive successful');
                    }
                });
            } else {
                $.ajax({
                    url: 'tag/status-active/' + status_id,
                    success: function(data) {
                        swal('Status Active successful');
                    }
                });
            }
        });

        // Post Tag Delete btn fix
        $(document).on('click', '.delete-btn', function(e) {

            let conf = confirm('Are you sure?');
            if (conf == true) {
                return true;
            } else {
                return false;
            }
        });

        // Post Category Edit
        $(document).on('click', '.edit_tag', function(event) {
            event.preventDefault();
            // get id
            let id = $(this).attr('edit_id');
            //send ajax request
            $.ajax({
                url: 'tag/' + id + '/edit',
                success: function(data) {
                    $('#update_tag_modal form input[name="name"]').val(data.name);
                    $('#update_tag_modal form input[name="edit_id"]').val(data.id);
                }
            });
            // for modal show
            $('#update_tag_modal').modal('show');
        });
        /******************************************************************
         *                    Post Tag Work END                           *
         ******************************************************************/

        /******************************************************************
         *                    Post Work START                             *
         ******************************************************************/
        // Post featured image load
        $(document).on('change', '#post_img_select', function(e) {

            let img_url = URL.createObjectURL(e.target.files[0]);
            $('#post_img_load').attr('src', img_url);
        });

        // Post Gallerly add( select post format)
        $(document).on('change', '#post_format', function() {
            let format = $(this).val();

            if ( format == 'Image') {
                $('.post-image').show();
            } else {
                $('.post-image').hide();
            }
            if ( format == 'Gallery') {
                $('.post-gallery').show();
            } else {
                $('.post-gallery').hide();
            }
            if ( format == 'Video') {
                $('.post-video').show();
            } else {
                $('.post-video').hide();
            }
            if ( format == 'Audio') {
                $('.post-audio').show();
            } else {
                $('.post-audio').hide();
            }
        });

        // Post Gallery featured Image Load
        $(document).on('change', '#post_img_select_gallery', function(event) {

            let img_gallery = '';
            for( i = 0; i < event.target.files.length ; i++ )
            {
                let file_url = URL.createObjectURL( event.target.files[i] );

                img_gallery += '<img class="shadow" src="'+file_url+'" >';
            }
            $('.post-gallery-img').html(img_gallery);

        });

        // admin dashboard menu fix
        $('#sidebar-menu ul li ul li.ok').parent('ul').slideDown();
        $('#sidebar-menu ul li ul li.ok a').css('color', '#5ae8ff');
        $('#sidebar-menu ul li ul li.ok').parent('ul').parent('li').children('a').css('background-color', '#19c1dc');
        $('#sidebar-menu ul li ul li.ok').parent('ul').parent('li').children('a').addClass('subdrop');




    });
})(jQuery)
