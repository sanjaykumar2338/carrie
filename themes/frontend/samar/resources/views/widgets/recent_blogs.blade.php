<div class="widget recent-posts-entry"> 
    <h6 class="widget-title"><span>{{ __('Recent Posts') }}</span></h6>
    <div class="widget-post-bx">
        @forelse($blogs as $blog)
            <div class="widget-post clearfix">
                <div class="dz-media"> 
                    <img src="{{ DzHelper::getStorageImage('storage/blog-images/'.@$blog->feature_img->value) }}" alt="{{ __('Blog Image') }}" >
                </div>
                <div class="dz-info">
                    @php
                        if($blog->visibility != 'Pu'){
                            $blog_visibility = $blog->visibility == 'Pr' ? __('Private: ') : __('Protected: ') ;
                        }else {
                            $blog_visibility = '';
                        }

                    @endphp
                    <h6 class="title"><a href="{{ DzHelper::laraBlogLink($blog->id) }}">{{ $blog_visibility }}{{ $blog->title }}</a></h6>
                    <div class="dz-meta">
                        <ul>
                            <li class="post-date"><a href="javascript:void(0);">{{ Carbon\Carbon::parse($blog->publish_on)->format(config('Site.custom_date_format')) }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        @empty
        <div class="col-md-12">{{ __('No record found.') }}</div>
        @endforelse
    </div>
</div>
