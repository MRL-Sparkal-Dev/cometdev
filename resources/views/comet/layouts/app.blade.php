<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from themes.hody.co/html/comet/blog-sidebar.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 11 Jan 2017 09:50:21 GMT -->
    @include('comet.layouts.head')

    <body>
        <!-- Preloader-->
        @include('comet.layouts.partials.preloader')
        <!-- End Preloader-->
        <!-- Navigation Bar-->

        @include( 'comet.layouts.header' )


        <!-- End Navigation Bar-->

        @include('comet.layouts.page-header')



            @section('main-section')
            @show


        <!-- Footer-->
        @include('comet.layouts.footer')

    </body>

</html>

