@php
    $date = !empty($year) ? $year : '';
    if (!empty($month)){
        $date = $year.' '.$month;
    }
    $title = __('Archives : ').$date;

    if(isset($user) && !empty($user)){
        $title = __('Author :').$user->name;
    }

@endphp

@extends('layout.default')

@section('content')
<!-- Content -->

    @include('elements.banner-inner', compact('title'))

    <div class="section-full bg-white content-inner">
        <div class="container">
            <div class="row">
                <div class="{{ (DzHelper::dzHasSidebar()) ? 'col-xl-9 col-lg-8 col-md-7 col-sm-12 col-12' : 'col-12' ; }}">
                    <div class="row loadmore-content">

                        @forelse($blogs as $blog)
                            <div class="{{ (DzHelper::dzHasSidebar()) ? 'col-lg-12' : 'col-lg-6' ; }} m-b30">
                                <div class="blog-card post-left">
                                    <div class="blog-card-media">
                                        <a href="{!! DzHelper::laraBlogLink($blog->id) !!}">
                                            <img src="{{ DzHelper::getStorageImage('storage/blog-images/'.@$blog->feature_img->value) }}" alt="{{ __('Blog Image') }}">
                                        </a>
                                    </div>
                                    <div class="blog-card-info">
                                        <ul class="cat-list">
                                            @forelse($blog->blog_categories as $blogcategory)
                                            <li class="title-sm post-tag"><a href="{!! DzHelper::laraBlogCategoryLink($blogcategory->id) !!}">{{ $blogcategory->title }}</a></li>
                                            @empty
                                            <li><a href="javascript:void(0);">{{ __('uncatagorized') }}</a></li>
                                            @endforelse
                                        </ul>
                                        @php
                                            if($blog->visibility != 'Pu'){
                                                $blog_visibility = $blog->visibility == 'Pr' ? __('Private: ') : __('Protected: ') ;
                                            }else {
                                                $blog_visibility = '';
                                            }
                                        @endphp
                                        <h4 class="title"><a href="{!! DzHelper::laraBlogLink($blog->id) !!}">{{ $blog_visibility }}{{ Str::limit($blog->title, 26, ' ...') }}</a></h4>
                                        <p>{{ Str::limit($blog->excerpt, 60, ' ...') }}</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            @php
                                                $permalink = DzHelper::laraBlogLink($blog->id);
                                                $image = '';
                                                if (isset($blog->feature_img->value) && Storage::exists('public/blog-images/'.$blog->feature_img->value)) {
                                                    $image = asset('storage/blog-images/'.$blog->feature_img->value);
                                                }
                                            @endphp
                                            {!! DzHelper::getBlogShareButton($blog->title, $permalink, $image) !!}
                                            <div>
                                                <a href="{!! DzHelper::laraBlogLink($blog->id) !!}" class="btn-link readmore"><i class="la la-arrow-right"></i></a>
                                            </div>
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
