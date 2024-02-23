@extends('layout.default')

@section('content')
<!-- Content -->

    @php
        $title =  __('Blogs');
    @endphp
    @include('elements.banner-inner', compact('title'))

    <div class="content-inner bg-img-fix">
        <div class="container">
            <div class="row">
                <div class="{{ (DzHelper::dzHasSidebar()) ? 'col-xl-8 col-lg-8 m-b50' : 'col-xl-12' ; }}">
                    <div class="row loadmore-content">
                        @forelse($blogs as $blog)
                            <div class="{{ (DzHelper::dzHasSidebar()) ? 'col-lg-6' : 'col-lg-4' ; }}">
                                <div class="dlab-blog style-2 m-b50">
                                    <div class="dlab-media rounded-md">
                                        <a href="{!! DzHelper::laraBlogLink($blog->id) !!}">
                                            <img src="{{ DzHelper::getStorageImage('storage/blog-images/'.@$blog->feature_img->value) }}" alt="{{ __('Blog Image') }}">
                                        </a>
                                    </div>
                                    <div class="dlab-info">
                                        @php
                                            if($blog->visibility != 'Pu'){
                                                $blog_visibility = $blog->visibility == 'Pr' ? __('Private: ') : __('Protected: ') ;
                                            }else {
                                                $blog_visibility = '';
                                            }
                                        @endphp
                                        <h4 class="title"><a href="{!! DzHelper::laraBlogLink($blog->id) !!}">{{ $blog_visibility }}{{ Str::limit($blog->title,30,'...') }}</a></h4>
                                        <p>{{ Str::limit($blog->excerpt, 90, ' ...') }}</p>
                                        <div class="dlab-meta mb-0">
                                            <ul>
                                                <li class="post-date">{{ $blog->created_at }}</li>
                                                <li class="post-author"><i class="las la-user-circle"></i>{{ __('By') }} <a href="{{ DzHelper::author($blog->user_id) }}"> {{ $blog->user->fullname }}</a></li>
                                                <li class="post-comment"><i class="las la-comment"></i><a href="javascript:void(0);">{{ __('Comments') }}<span>{{ $blog->blog_comments->count() }}</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                        <div class="col-md-12">{{ __('No record found.') }}</div>
                        @endforelse
                        <div class="col-lg-12 m-b40">
                            {!! $blogs->links('elements.pagination') !!}
                        </div>
                    </div>
                </div>
                @include('widgets.sidebar')
            </div>
        </div>
    </div>
    <!-- Blog Post End -->

<!-- End Content -->

@endsection
