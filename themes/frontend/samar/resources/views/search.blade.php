@extends('layout.default')

@section('content')

<!-- Content -->

    @php
        $search_res = $title;
        $title =  __('Search Results for : '). $title;
    @endphp
    @include('elements.banner-inner', compact('title'))

    <div class="section-full bg-white content-inner">
        <div class="container">
            <div class="row">
                <div class="{{ (DzHelper::dzHasSidebar()) ? 'col-xl-8 col-lg-8 m-b50' : 'col-12' ; }}">
                    <div class="widget w-100">
                        <div class="search-bx">
                            <form method="get" action="{{ route('permalink.search') }}">
                                @csrf
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="la la-search"></i></span>
                                    </div>
                                    <input name="s" type="text" class="form-control" value="{{ $search_res }}" placeholder="{{ __('Search..') }}">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-primary"><i class="la la-long-arrow-right"></i></button>
                                    </span> 
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="row loadmore-content">
                        @forelse($blogs as $blog)
                            <div class="{{ (DzHelper::dzHasSidebar()) ? 'col-lg-12' : 'col-lg-6' ; }} m-b30">
                                @php
                                    $single_link = DzHelper::laraBlogLink($blog->id);
                                    if(array_key_exists('page_type',$blog->toArray())) {
                                        $single_link = DzHelper::laraPageLink($blog->id);
                                    }
                                @endphp
                                <div class="dlab-blog style-1 bg-white m-b50">
                                    <div class="dlab-media dlab-img-effect zoom">
                                        <a href="{!! $single_link !!}">
                                            @if(optional($blog->feature_img)->value)
                                                @if (Storage::exists('public/page-images/'.$blog->feature_img->value))
                                                    <img src="{{ asset('storage/page-images/'.$blog->feature_img->value) }}" alt="{{ __('Blog Image') }}">
                                                @elseif (Storage::exists('public/blog-images/'.$blog->feature_img->value))
                                                    <img src="{{ asset('storage/blog-images/'.$blog->feature_img->value) }}" alt="{{ __('Blog Image') }}">
                                                @else
                                                    <img src="{{ asset('images/noimage.jpg') }}" alt="{{ __('Blog Image') }}">
                                                @endif
                                            @else
                                                <img src="{{ asset('images/noimage.jpg') }}" alt="{{ __('Blog Image') }}">
                                            @endif
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
                                        <h4 class="dlab-title"><a href="{!! $single_link !!}">{{ $blog_visibility }}{{ Str::limit($blog->title, 26, ' ...') }}</a></h4>
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
                    </div>
                </div>
                @include('widgets.sidebar')
            </div>
        </div>
    </div>
<!-- Content end -->
@endsection