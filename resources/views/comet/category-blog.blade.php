@extends('comet.layouts.app')

@section('main-section')
<section>
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <div class="blog-posts">

            @foreach($all_posts as $post)

                @php
                    $featured = json_decode( $post -> featured );
                @endphp

                <article class="post-single">
                    <div class="post-info">
                        <h2><a href="{{ route('post.single',$post -> slug) }}">{{ $post -> title }}</a></h2>
                        <h6 class="upper"><span>By</span><a href=""> {{ $post -> user -> name }}</a><span class="dot"></span><span>{{ date('d F Y', strtotime($post -> created_at)) }}</span><span class="dot"></span><a href="#" class="post-tag">Startups</a></h6>
                    </div>

                    @if( $featured -> post_type == 'Image')
                        <div class="post-media">
                            <a href="#">
                                <img src="{{ URL::to('') }}/media/post/{{ $featured -> image }}" alt="">
                            </a>
                        </div>
                    @endif

                    @if( $featured -> post_type == 'Gallery')
                        <div class="post-media">
                            <div data-options="{&quot;animation&quot;: &quot;slide&quot;, &quot;controlNav&quot;: true" class="flexslider nav-outside">
                                <ul class="slides">

                                    @foreach( $featured -> post_gallery as $gallery)
                                        <li class="" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 0; display: block; z-index: 1;">
                                            <img src="{{ URL::to('') }}/media/post/{{ $gallery }}" alt="" draggable="true">
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                    @if ( $featured -> post_type == 'Video' )
                        <div class="post-media">
                            <div class="media-video">
                            <iframe src="{{ $featured -> post_video }}" frameborder="0"></iframe>
                            </div>
                        </div>
                    @endif

                    @if ( $featured -> post_type == 'Audio' )
                        <audio controls>
                            {{-- <source src="{{ $featured -> post_audio }}" type="audio/ogg"> --}}
                            <source src="{{ $featured -> post_audio }}" type="audio/mpeg">
                        </audio>
                    @endif

                    <div class="post-body">
                        {!! Str::of(htmlspecialchars_decode($post -> content)) -> words(30) !!}
                        <p><a href="{{ route('post.single',$post -> slug) }}" class="btn btn-color btn-sm">Read More</a></p>
                    </div>
                </article>
             @endforeach
            <!-- end of article-->

          </div>


            {{-- Pagination --}}
{{--          {{ $all_posts -> links('paginate') }}--}}

        </div>

        @include( 'comet.layouts.partials.sidebar' )


      </div>
      <!-- end of row-->
    </div>
    <!-- end of container-->
  </section>

@endsection
