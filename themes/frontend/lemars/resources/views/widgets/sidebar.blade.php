
@if (!empty(config('Widget.show_sidebar')))
<div class="col-xl-3 col-lg-4 col-md-5 col-sm-12 col-12">
    <div class="side-bar p-l15 m-b0 sticky-top">

        {{-- Widget-Search --}}
        {!! DzHelper::SearchWidget(); !!}
        {{-- Widget-Search --}}

        {{-- recent-blogs --}}
        @if(!empty(config('Widget.show_recent_post_widget')))
            {!! DzHelper::recentBlogs( array('limit'=>3, 'order'=>'asc', 'orderby'=>'created_at') ); !!}
        @endif
        {{-- recent-blogs --}}

        {{-- recent-categories --}}
        {!! DzHelper::categoryBlogs( array('limit'=>4, 'order'=>'asc', 'orderby'=>'title')); !!}
        {{-- recent-categories --}}
        
        {{-- recent-archives --}}
        {!! DzHelper::archiveBlogs(); !!}
        {{-- recent-archives --}}

        {{-- BlogTags --}}
        {!! DzHelper::BlogTags(); !!}
        {{-- BlogTags --}}
    </div>
</div>
@endif