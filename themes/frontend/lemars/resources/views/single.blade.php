@extends('layout.default')

@php
    $title = __('Blog Details');
    $requiredFieldIndicator = config('Discussion.name_email_require') ? DzHelper::requiredFieldIndicator() : '';
    $isRequired = config('Discussion.name_email_require') ? 'required' : '';
    $comment_author = !empty($_COOKIE['comment_author_'.config('constants.comment_cookie_hash')]) ? $_COOKIE['comment_author_'.config('constants.comment_cookie_hash')] : '';
    $comment_email = !empty($_COOKIE['comment_email_'.config('constants.comment_cookie_hash')]) ? $_COOKIE['comment_email_'.config('constants.comment_cookie_hash')] : '';
    $comment_url = !empty($_COOKIE['comment_website_'.config('constants.comment_cookie_hash')]) ? $_COOKIE['comment_website_'.config('constants.comment_cookie_hash')] : '';
@endphp

@section('content')

    @include('elements.banner-inner', compact('title'))

    <!-- Blog Detail -->
    <div class="section-full content-inner bg-white">
        <div class="container">
            <div class="row">
                @if($blog)
                    @php
                        if($blog->visibility != 'Pu'){
                            $blog_visibility = $blog->visibility == 'Pr' ? __('Private: ') : __('Protected: ');
                        }else {
                            $blog_visibility = '';
                        }
                    @endphp
                <div class="{{ (DzHelper::dzHasSidebar()) ? 'col-xl-9 col-lg-8 col-md-7 col-sm-12 col-12' : 'col-12' ; }}">
                    @if ($blog->visibility == 'PP' && $status == 'locked')
                        <form method="POST" class="dz-form style-1 my-5">
                            @csrf
                            <h5 class="text-primary mb-3">{{ __('This content is password protected. To view it please enter your password below:') }}</h5>

                            <div class="row">
                                <div class="col-md-8 d-flex">
                                    <div class="input-area col-sm-8">
                                        <label for="password" class="form-control-label">{{ __('Password') }}</label>
                                        <div class=" input-line">
                                            <input id="password" type="password" class="form-control" required name="password">
                                        </div>
                                    </div>
                                    
                                    <div class="col-4 text-end d-flex justify-content-end">
                                        <button type="submit" class="btn btn-dark align-self-end">
                                            <span>{{ __('Login') }}</span>
                                        </button>
                                    </div>
                                </div>
                                @error('password')
                                    <p class="text-danger mt-2">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </form>
                    @endif
                    @if ($status == 'unlock_'.$blog->id)
                        <div class="section-head text-center">
                            <ul class="cat-list">
                                @forelse($blog->blog_categories as $blogcategory)
                                <li class="title-sm post-tag"><a href="{!! DzHelper::laraBlogCategoryLink($blogcategory->id) !!}">{{ $blogcategory->title }}</a></li>
                                @empty
                                <li><a href="javascript:void(0);">{{ __('uncatagorized') }}</a></li>
                                @endforelse
                            </ul>
                            <h2 class="title-head">{{ $blog_visibility }}{{ $blog->title }}</h2>
                        </div>
                        <div class="blog-post blog-single blog-post-style-2 sidebar">
                            <div class="dlab-post-info">
                                <div class="dlab-post-text text">
                                    <div class="alignwide">
                                        <figure class="aligncenter">
                                            <img src="{{ DzHelper::getStorageImage('storage/blog-images/'.@$blog->feature_img->value) }}" alt="{{ __('Blog Image') }}">
                                        </figure>
                                    </div>
                                    <p class="blog-excerpt fs-5">{{ optional($blog)->excerpt }}</p>

                                    {!! $blog->content !!}
                                </div>
                                <div class="blog-card-info style-1 no-bdr">
                                    <div class="date">{{ $blog->publish_on }}</div>
                                    @php
                                        $permalink = DzHelper::laraBlogLink($blog->id);
                                        $image = '';
                                        if (optional($blog->feature_img)->value && Storage::exists('public/blog-images/'.$blog->feature_img->value)) {
                                            $image = asset('storage/blog-images/'.$blog->feature_img->value);
                                        }
                                    @endphp
                                    {!! DzHelper::getBlogShareButton($blog->title, $permalink, $image) !!}
                                    <div>
                                        <a href="#respond" class="btn-link comment">{{ __('WRITE A COMMENT') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div>
                        <div class="author-box blog-user m-b60">
                            <div class="author-profile-info">
                                <div class="author-profile-pic">
                                    <img src="{{ HelpDesk::user_img(optional($blog->user)->profile); }}" alt="{{ __("user's profile") }}">
                                </div>
                                <div class="author-profile-content">
                                    <h6>{{ __('By') }} {{ optional($blog->user)->name }}</h6>
                                    <p>{{ __('Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quisma bibendum auctor nisi elit consequat ipsum, nec sagittis sem amet nibh vulputate cursus itaet mauris.') }} </p>
                                    <ul class="list-inline m-b0">
                                        <li><a target="_blank" href="https://twitter.com/" class="btn-link"><i class="fab fa-twitter"></i></a></li>
                                        <li><a target="_blank" href="https://in.pinterest.com/" class="btn-link"><i class="fab fa-pinterest-p"></i></a></li>
                                        <li><a target="_blank" href="https://www.facebook.com/" class="btn-link"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a target="_blank" href="https://www.instagram.com/" class="btn-link"><i class="fab fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @if (isset($blogs) && count($blogs) > 0)
                        <div class="post-btn">
                            <div class="prev-post">
                                <img src="{{ DzHelper::getStorageImage('storage/blog-images/'.@$blogs[0]->feature_img->value) }}" alt="{{ __('Blog Image') }}">
                                <h6 class="title">
                                    <a href="{{ DzHelper::laraBlogLink($blogs[0]->id) }}">{{ Str::limit($blogs[0]->title, 24, '..') }}</a>
                                    <span class="post-date">{{ $blogs[0]->publish_on }}</span>
                                </h6>
                            </div>
                            <div class="next-post">
                                <h6 class="title">
                                <a href="{{ DzHelper::laraBlogLink($blogs[1]->id) }}">{{ Str::limit($blogs[1]->title, 24, '..') }}</a>
                                <span class="post-date">{{ $blogs[1]->publish_on }}</span></h6>
                                <img src="{{ DzHelper::getStorageImage('storage/blog-images/'.@$blogs[1]->feature_img->value) }}" alt="{{ __('Blog Image') }}">
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="clear m-b30" id="comment-list">
                        <div class="comments-area" id="comments-div">
                            <h6 class="comments-title"><span>{{ $total_comments }} {{ __('Comments') }}</span></h6>
                            @if($comments->isNotEmpty())
                                <ol class="comment-list">
                                    @forelse($comments as $comment)
                                        <li class="comment">
                                            <div class="comment-body">
                                                <div class="comment-author vcard">
                                                    @if (optional($comment->user)->profile && Storage::exists('public/user-images/'.$comment->user->profile))
                                                        <img class="avatar photo" src="{{ asset('storage/user-images/'.$comment->user->profile) }}" alt=""> 
                                                    @else
                                                        <img class="avatar photo" src="{{ asset('images/no-user.png') }}" alt=""> 
                                                    @endif
                                                    <cite class="fn">{{ $comment->commenter }}</cite>
                                                </div>
                                                <div class="comment-meta">
                                                    <span>{{ \Carbon\Carbon::parse($comment->created_at)->format('d , F, Y') }}</span>
                                                </div>
                                                <div class="reply">
                                                    <a rel="nofollow" href="{{ DzHelper::laraPageLink($blog->id) }}?replytocom={{ $comment->id }}#respond" class="comment-reply-link w3-comment-reply" data-commentid="{{ $comment->id }}" data-postid="{{ $blog->id }}" data-replyto="Reply to {{ $comment->commenter }}"> 
                                                    <i class="fa fa-reply"></i>
                                                    </a> 
                                                </div>
                                                <div class="comment-info">
                                                    <p>{{ $comment->comment }}</p>
                                                </div>
                                            </div>
                                            @if (isset($comment->child_comments) && $comment->child_comments->isNotEmpty())
                                                @include('elements.child_comments', ['comments' => $comment->child_comments,'parent_comment' => $comment->commenter, 'depth' => 1])
                                            @endif
                                        </li>
                                    @empty
                                    @endforelse
                                </ol>
                            @endif
                            <div class="mb-4">
                                @if(config('Discussion.page_comments'))
                                    {!! $comments->links('elements.pagination') !!}
                                @endif
                            </div>
                            @if(!config('Discussion.registration_comment'))
                                <div id="ReplyFormContainer">
                                    @if(Session::has('unapprove_comment_error'))
                                        <div class="alert alert-danger alert-dismissible alert-alt fade show">
                                            <strong>{{ __('common.error') }}</strong> {{ Session::get('unapprove_comment_error') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                                        </div>
                                    @endif
                                    <div class="default-form comment-respond style-1 mb-4" id="respond">
                                        <div class="comment-reply-title text-center mb-3">
                                            <span>{{ __('LEAVE A REPLY') }}</span>
                                        </div>
                                        <h5>
                                            <span id="reply-title"></span>
                                            <small class="fw-normal"> <a rel="nofollow" id="cancel-comment-reply" href="{{ DzHelper::laraBlogLink($blog->id) }}#respond" style="display: none;">{{ __('Cancel reply') }}</a> </small>
                                        </h5>
                                        @auth
                                            <p class="m-t0">{{ __('You are Logged in as') }} <a href="{{ route('admin.users.profile') }}">{{ Auth::user()->name }}</a></p>
                                        @endauth
                                        <form action="{{ route('comments.admin.store') }}" class="comment-form" id="commentform" method="post">
                                            @csrf
                                            @error('commenter')
                                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                    {{ $message }}
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>
                                            @enderror
                                            @error('email')
                                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                    {{ $message }}
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>
                                            @enderror
                                            @error('comment')
                                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                    {{ $message }}
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>
                                            @enderror
            
                                            @if( Session::get('success'))
                                                <div class="m-b30">
                                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                        {{ Session::get('success') }}
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                    </div>
                                                </div>
                                            @endif
                                            <input type="hidden" name="object_id" value="{{ $blog->id }}">
                                            <input type="hidden" name="parent_id" id="comment_parent" value="0">
                                            @guest
                                                <p class="m-b30">
                                                    <input type="text" name="commenter" placeholder="{{ __('Name') }}" id="commenter" {{ old('commenter', $comment_author) }} class="form-control" {{ $isRequired }}>
                                                </p>
                                                <p class=" m-b30">
                                                    <input type="text" placeholder="{{ __('Email') }}" name="email" id="email" value="{{ old('email', $comment_email) }}" class="form-control" {{ $isRequired }}>
                                                </p>
                                                <p class="m-b30">
                                                    <input type="text" placeholder="{{ __('Website url') }}" name="profile_url" id="profileurl" {{ old('profile_url', $comment_url) }} class="form-control">
                                                </p>
                                            @endguest
                                            <p class="comment-form-comment m-b30">
                                                <textarea rows="8" name="comment" placeholder="{{ __('Type Comment here ...') }}" id="comment" class="form-control">{{ old('comment') }}</textarea>
                                            </p>
                                            @guest
                                                @if(config('Discussion.save_comments_cookie'))
                                                    <p class="comment-form-comment">
                                                        <input type="checkbox" name="set_comment_cookie" class="form-check-input" id="set_comment_cookie" @checked($comment_author || $comment_email || $comment_url)>
                                                        <label for="set_comment_cookie" class="d-block">{{ __('Remember details for future comments: Name, Email, and Website.') }}</label>
                                                    </p>
                                                @endif
                                            @endguest
                                            <p class="form-submit m-b30">
                                                <button href="#respond" type="submit" class="btn btn-dark btn-skew btn-icon" id="submit"><span>{{ __('Submit Now') }}</span></button>
                                            </p>
                                        </form>
                                    </div>
                                </div>
                            @else
                                <p>{{ __('Please') }} <a href="{{ route('admin.login') }}">{{ __('log in') }}</a> {{ __('to post a comment.') }}</p>
                            @endif
                            <!-- Form END -->
                        </div>
                    </div>
                </div>
                @else
                <div class="col">{{ __('Record Not found.') }}</div>
                @endif
                @include('widgets.sidebar')
            </div>
        </div>
    </div>
    <!-- Blog Detail End -->

@endsection