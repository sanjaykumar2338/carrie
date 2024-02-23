@if(config('Discussion.thread_comments') && $depth < config('Discussion.thread_comments_depth'))
    <ol class="children">
        @php
            $depth++;
        @endphp
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
                    <p><span class="text-primary text-lowercase me-2 fw-bold fst-italic user-select-none">{{ __('@') }}{{ str_replace(' ', '', $parent_comment) }}</span>{{ $comment->comment }}</p>
                   <div class="reply">
                        @if($comment->object_type=="1")
                            <a rel="nofollow" href="{{ DzHelper::laraBlogLink($comment->object_id) }}?replytocom={{ $comment->id }}#respond" class="comment-reply-link w3-comment-reply" data-commentid="{{ $comment->id }}" data-postid="{{ $comment->object_id }}"  data-replyto="Reply to {{ $comment->commenter }}">
                            <i class="fa fa-reply"></i>{{ __('REPLY') }}
                            </a>
                        @else
                            <a rel="nofollow" href="{{ DzHelper::laraPageLink($blog->id) }}?replytocom={{ $comment->id }}#respond" class="comment-reply-link w3-comment-reply" data-commentid="{{ $comment->id }}" data-postid="{{ $comment->object_id }}"  data-replyto="Reply to {{ $comment->commenter }}">
                            <i class="fa fa-reply"></i>{{ __('REPLY') }}
                            </a>
                        @endif
                    </div>
                </div>
                @if (isset($comment->child_comments) && $comment->child_comments->isNotEmpty())
                   @include('elements.child_comments', ['comments' => $comment->child_comments,'parent_comment' => $comment->commenter, 'depth' => $depth])
                @endif
                <!-- list END -->
            </li>
    	@empty
    	@endforelse
    </ol>
@else
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
                <p><span class="text-primary text-lowercase me-2 fw-bold fst-italic user-select-none">{{ __('@') }}{{ str_replace(' ', '', $parent_comment) }}</span>{{ $comment->comment }}</p>
            <div class="reply">
                    @if($comment->object_type=="1")
                        <a rel="nofollow" href="{{ DzHelper::laraBlogLink($comment->object_id) }}?replytocom={{ $comment->id }}#respond" class="comment-reply-link w3-comment-reply" data-commentid="{{ $comment->id }}" data-postid="{{ $comment->object_id }}"  data-replyto="Reply to {{ $comment->commenter }}">
                        <i class="fa fa-reply"></i>{{ __('REPLY') }}
                        </a>
                    @else
                        <a rel="nofollow" href="{{ DzHelper::laraPageLink($blog->id) }}?replytocom={{ $comment->id }}#respond" class="comment-reply-link w3-comment-reply" data-commentid="{{ $comment->id }}" data-postid="{{ $comment->object_id }}"  data-replyto="Reply to {{ $comment->commenter }}">
                        <i class="fa fa-reply"></i>{{ __('REPLY') }}
                        </a>
                    @endif
                </div>
            </div>
            @if (isset($comment->child_comments) && $comment->child_comments->isNotEmpty())
                @include('elements.child_comments', ['comments' => $comment->child_comments,'parent_comment' => $comment->commenter, 'depth' => $depth])
            @endif
            <!-- list END -->
        </li>
    @empty
    @endforelse
@endif
