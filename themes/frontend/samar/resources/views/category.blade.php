@extends('layout.default')

@section('content')
<!-- Content -->

    @php
        $title =  __('Category : ').$title;
    @endphp
    @include('elements.banner-inner', compact('title'))

    <div class="section-full bg-white content-inner">
        <div class="container">
            <div class="row">
                <div class="{{ (DzHelper::dzHasSidebar()) ? 'col-xl-8 col-lg-8 m-b50' : 'col-12' ; }}">
                    <div class="row loadmore-content">

                        @forelse($blogs as $blog)
                            <div class="{{ (DzHelper::dzHasSidebar()) ? 'col-lg-12' : 'col-lg-6' ; }} m-b30">
                                <div class="dlab-blog style-1 bg-white m-b50">
                                    <div class="dlab-media dlab-img-effect zoom">
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
                                        <h4 class="dlab-title"><a href="{!! DzHelper::laraBlogLink($blog->id) !!}">{{ $blog_visibility }}{{ Str::limit($blog->title, 26, ' ...') }}</a></h4>
                                        <p>{{ Str::limit($blog->excerpt, 60, ' ...') }}</p>
                                        <div class="dlab-meta meta-bottom">
                                            <ul>
                                                <li class="post-date"><i class="flaticon-clock m-r10"></i>{{ $blog->created_at }}</li>
                                                <li class="post-author"><i class="flaticon-user m-r10"></i>{{ __('By') }} <a href="javascript:void(0);"> {{ $blog->user->fullname }}</a></li>
                                                <li class="post-comment"><a href="javascript:void(0);"><i class="flaticon-speech-bubble"></i><span>{{ $blog->comments->count() }}</span></a></li>
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

<!-- Content end -->
@endsection