@extends('layout.default')

@php
    $title = __('Blog Details');
    $requiredFieldIndicator = config('Discussion.name_email_require') ? DzHelper::requiredFieldIndicator() : '';
    $isRequired = config('Discussion.name_email_require') ? 'required' : '';
    $comment_author = !empty($_COOKIE['comment_author_' . config('constants.comment_cookie_hash')]) ? $_COOKIE['comment_author_' . config('constants.comment_cookie_hash')] : '';
    $comment_email = !empty($_COOKIE['comment_email_' . config('constants.comment_cookie_hash')]) ? $_COOKIE['comment_email_' . config('constants.comment_cookie_hash')] : '';
    $comment_url = !empty($_COOKIE['comment_website_' . config('constants.comment_cookie_hash')]) ? $_COOKIE['comment_website_' . config('constants.comment_cookie_hash')] : '';
@endphp

@section('content')

    @include('elements.banner-inner', compact('title'))

    <!-- Blog Detail -->
    <div class="section-full content-inner bg-white">
        <div class="container">
            <div class="row">
            @if ($blog)
                @php
                    if ($blog->visibility != 'Pu') {
                        $blog_visibility = $blog->visibility == 'Pr' ? __('Private: ') : __('Protected: ');
                    } else {
                        $blog_visibility = '';
                    }
                @endphp
                <div class="{{ DzHelper::dzHasSidebar() ? 'col-xl-8 col-lg-8 m-b50' : 'col-12' }}">
                    @if ($blog->visibility == 'PP' && $status == 'locked')
                        <form method="POST" class="dz-form style-1 mb-5 ">
                            @csrf
                            <h5 class="text-primary mb-3">{{ __('This content is password protected. To view it please enter your password below:') }}</h5>

                            <div class=" row">
                                <div class="col-md-8 d-flex">
                                    <div class="input-area col-sm-8">
                                        <label for="password" class="form-control-label">{{ __('Password') }}</label>
                                        <div class=" input-line">
                                            <input id="password" type="password" class="form-control" required name="password">
                                        </div>
                                    </div>
                                    
                                    <div class="col-4 text-end d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary align-self-end">
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
                    @if ($status == 'unlock_' . $blog->id)
                        <div class="dlab-blog blog-single style-1 sidebar">
                            <div class="dlab-media rounded-md shadow">
                                <img src="{{ DzHelper::getStorageImage('storage/blog-images/'.@$blog->feature_img->value) }}" alt="{{ __('Blog Image') }}">
                            </div>
                            <div class="dlab-info">
                                <div class="dlab-meta  border-0 py-0 mb-2">
                                    <ul>
                                        <li class="post-date"><i
                                                class="flaticon-clock m-r10"></i>{{ $blog->created_at }}</li>
                                        <li class="post-author"><i class="flaticon-user m-r10"></i>{{ __('By') }}
                                            <a href="javascript:void(0);"> {{ $blog->user->fullname }}</a></li>
                                    </ul>
                                </div>
                                <h4 class="dlab-title mb-0">{{ $blog_visibility }}{{ $blog->title }}</h2>
                                <p class="blog-excerpt fs-5">{{ optional($blog)->excerpt }}</p>
                            </div>

                            {!! $blog->content !!}
                            <div class="date mb-3">{{ $blog->publish_on }}</div>
                            <div class="blog-card-info style-1 no-bdr">
                                @php
                                    $permalink = DzHelper::laraBlogLink($blog->id);
                                    $image = '';
                                    if (optional($blog->feature_img)->value && Storage::exists('public/blog-images/' . $blog->feature_img->value)) {
                                        $image = asset('storage/blog-images/' . $blog->feature_img->value);
                                    }
                                @endphp
                                <div class="dlab-meta meta-bottom border-top">
                                    <div class="post-tags">
                                    <strong>{{ __('Tags:') }}</strong>
                                        @forelse($blog->blog_tags as $blog_tag)
                                        <a href="{{ DzHelper::laraBlogTagLink($blog_tag->id) }}"><span>{{ $blog_tag->title }}</span></a>
                                        @empty
                                        @endforelse
                                    </div>
                                    <div class="dlab-social-icon primary-light">
                                        <ul>
                                            <li><a target="_blank" title="Facebook" href="{{ config('Social.facebook') }}"
                                                    class="site-button-link fab fa-facebook-f"></a></li>
                                            <li><a target="_blank" title="Twitter" href="{{ config('Social.twitter') }}"
                                                    class="site-button-link fab fa-twitter"></a></li>
                                            <li><a target="_blank" title="Linkedin-in" href="{{ config('Social.linkedin') }}"
                                                    class="site-button-link fab fa-linkedin-in"></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if(isset($blogs) && !empty($blogs))
                        <div class="row extra-blog style-1">
                            <div class="col-lg-12">
                                <h4 class="blog-title">{{ __('Related Blog') }}</h4>
                                <div class="row m-b30 m-sm-b10">
                                    @forelse($blogs as $related_blog)
                                        <div class="col-lg-6 m-b30">
                                            <div class="dlab-blog style-1 bg-white m-b30">
                                                <div class="dlab-media ">
                                                    <a href="{{ DzHelper::laraBlogLink($related_blog->id) }}">
                                                        <img src="{{ DzHelper::getStorageImage('storage/blog-images/'.@$related_blog->feature_img->value) }}" alt="{{ __('Blog Image') }}">
                                                    </a>
                                                </div>
                                                <div class="dlab-info">
                                                    @php
                                                        if($related_blog->visibility != 'Pu'){
                                                            $related_blog_visibility = $related_blog->visibility == 'Pr' ? __('Private: ') : __('Protected: ') ;
                                                        }else {
                                                            $related_blog_visibility = '';
                                                        }
                                                    @endphp
                                                    <h5 class="dz-title"><a href="{{ DzHelper::laraBlogLink($related_blog->id) }}">{{ $related_blog_visibility }}{{ Str::limit($related_blog->title, 24, ' ...') }}</a></h5>
                                                    <p class="m-b0">{{ Str::limit($related_blog->excerpt, 90, ' ...') }}</p>
                                                    <div class="dlab-meta meta-bottom">
                                                        <ul>
                                                            <li class="post-date"><i class="flaticon-clock m-r10"></i><a href="javascript:void(0);">{{ Carbon\Carbon::parse($related_blog->publish_on)->format(config('Site.custom_date_format')) }}</a></li>
                                                            <li class="post-comment">
                                                                <i class="flaticon-speech-bubble m-r10"></i>
                                                                <a class="text-primary" href="{{ DzHelper::author($related_blog->user_id) }}">
                                                                    {{ $related_blog->blog_comments->count() }}
                                                                </a>
                                                            </li>
                                                            <li class="post-share"><i class="flaticon-share"></i>
                                                                <ul>
                                                                    <li><a target="_blank" title="Facebook" href="{{ config('Social.facebook') }}"
                                                                        class="site-button-link fab fa-facebook-f"></a></li>
                                                                <li><a target="_blank" title="Twitter" href="{{ config('Social.twitter') }}"
                                                                        class="site-button-link fab fa-twitter"></a></li>
                                                                <li><a target="_blank" title="Linkedin-in" href="{{ config('Social.linkedin') }}"
                                                                    class="site-button-link fab fa-linkedin-in"></a></li>
                                                                </ul>
                                                            </li>
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
                        </div>
                    @endif

                    <div class="clear" id="comment-list">
                        <div class="comments-area style-2" id="comments-div">
                            <h3 class="comments-title">{{ $total_comments }} {{ __('COMMENTS') }}</h3>
                            <div class="dlab-separator style-1"></div>
                            <div class="clearfix">
                                <!-- comment list END -->
                                @if($comments->isNotEmpty())
                                    <ul class="comment-list">
                                        @forelse($comments as $comment)
                                            <li class="comment">
                                                <div class="comment-body">
                                                    <div class="comment-author vcard"> 
                                                    @if (optional($comment->user)->profile && Storage::exists('public/user-images/'.$comment->user->profile))
                                                            <img class="avatar photo" src="{{ asset('storage/user-images/'.$comment->user->profile) }}" alt="{{ __('image') }}">
                                                    @else
                                                            <img class="avatar photo" src="{{ asset('images/no-user.png') }}" alt="{{ __('image') }}">
                                                    @endif
                                                        <cite class="fn">
                                                            {{ $comment->commenter }}
                                                            <span class="user-select-none">{{ __('.') }}</span>
                                                            <span class="fs-6 user-select-none">{{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</span>
                                                        </cite>
                                                    </div>
                                                    <p>{{ $comment->comment }}</p>
                                                    <div class="reply">
                                                        <a rel="nofollow" href="{{ DzHelper::laraBlogLink($blog->id) }}?replytocom={{ $comment->id }}#respond" class="comment-reply-link w3-comment-reply" data-commentid="{{ $comment->id }}" data-postid="{{ $blog->id }}"  data-replyto="Reply to {{ $comment->commenter }}">
                                                        <i class="fa fa-reply"></i>{{ __('Reply') }}
                                                        </a>
                                                    </div>
                                                </div>
                                                @if (isset($comment->child_comments) && $comment->child_comments->isNotEmpty())
                                                @include('elements.child_comments', ['comments' => $comment->child_comments,'parent_comment' => $comment->commenter, 'depth' => 1])
                                                @endif
                                                <!-- list END -->
                                            </li>
                                        @empty
                                        @endforelse
                                    </ul>
                                    <div class="mb-4">
                                        @if(config('Discussion.page_comments'))
                                            {!! $comments->links('elements.pagination') !!}
                                        @endif
                                    </div>
                                @endif
                                <!-- comment list END -->

                                <!-- Form -->
                                @if(!config('Discussion.registration_comment'))
                                    <div id="ReplyFormContainer">
                                        @if(Session::has('unapprove_comment_error'))
                                            <div class="alert alert-danger alert-dismissible alert-alt fade show">
                                                <strong>{{ __('common.error') }}</strong> {{ Session::get('unapprove_comment_error') }}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                                            </div>
                                        @endif
                                        <h3 class="comment-reply-title">{{ __('Leave A Reply') }}</h3>
                                        <div class="dlab-separator style-1 m-b30"></div>
                                        <h5 class="d-none my-3">
                                            <span id="reply-title"></span>
                                            <small class="ms-2"> 
                                                <a rel="nofollow" class="d-none text-danger fw-normal fs-6 text" id="cancel-comment-reply" href="{{ DzHelper::laraBlogLink($blog->id) }}#respond">
                                                    {{ __('Cancel reply') }}
                                                </a>
                                            </small>
                                        </h5>
                                        @auth
                                            <p>{{ __('You are Logged in as') }} <a href="{{ route('admin.users.profile') }}">{{ Auth::user()->name }}</a></p>
                                        @endauth
                                        <div class="clearfix">
                                            <!-- Form -->
                                            <div class="default-form comment-respond style-1" id="respond">
                                                <form action="{{ route('comments.admin.store') }}" class="comment-form row" id="commentform" method="post">
                                                    @csrf
                                                    <div class="container">
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
                                                    </div>
                                                    @if( Session::get('success'))
                                                        <div class="col-12 m-b30">
                                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                                {{ Session::get('success') }}
                                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    <input type="hidden" name="object_id" value="{{ $blog->id }}">
                                                    <input type="hidden" name="parent_id" id="comment_parent" value="0">
                                                    @guest
                                                        <div class="col-sm-4 m-b30">
                                                            <input type="text" name="commenter" placeholder="{{ __('Name') }}" id="commenter" {{ old('commenter', $comment_author) }} class="form-control" {{ $isRequired }}>
                                                        </div>
                                                        <div class="col-sm-4 m-b30">
                                                            <input type="text" placeholder="{{ __('Email') }}" name="email" id="email" value="{{ old('email', $comment_email) }}" class="form-control" {{ $isRequired }}>
                                                        </div>
                                                        <div class="col-sm-4 m-b30">
                                                            <input type="text" placeholder="{{ __('Website url') }}" name="profile_url" id="profileurl" {{ old('profile_url', $comment_url) }} class="form-control">
                                                        </div>
                                                    @endguest
                                                    <div class="col-12 m-b30">
                                                        <textarea rows="8" name="comment" placeholder="{{ __('Comment') }}" id="comment" class="form-control">{{ old('comment') }}</textarea>
                                                    </div>
                                                    @guest
                                                        @if(config('Discussion.save_comments_cookie'))
                                                            <div class="col-12 m-b30">
                                                                <label class="form-check-label d-block">
                                                                    <input type="checkbox" name="set_comment_cookie" class="form-check-input" @checked($comment_author || $comment_email || $comment_url)>
                                                                    {{ __('Remember details for future comments: Name, Email, and Website.') }}
                                                                </label>
                                                            </div>
                                                        @endif
                                                    @endguest
                                                    <div class="col-12 form-submit m-b30">
                                                        <button href="#respond" type="submit" class="btn btn-primary" id="submit">{{ __('Submit Now') }}<i class="fa fa-angle-right m-l10"></i></button>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- Form -->
                                        </div>
                                    </div>
                                @else
                                    <p>{{ __('Please') }} <a href="{{ route('admin.login') }}">{{ __('log in') }}</a> {{ __('to post a comment.') }}</p>
                                @endif
                                <!-- Form -->
                            </div>
                        </div>
                    </div>
                </div>
                @include('widgets.sidebar')
            </div>
            @else
                <div class="col">{{ __('Record Not found.') }}</div>
            @endif
        </div>
        <!-- Blog Detail End -->

    @endsection
