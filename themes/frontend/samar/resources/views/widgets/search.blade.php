<div class="widget">
    <div class="search-bx">
        <form action="{{ route('permalink.search') }}" role="search" method="get">
            @csrf
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="la la-search"></i></span>
                </div>
                <input name="s" class="form-control" placeholder="{{ __('Search..') }}" type="text">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-primary"><i class="la la-long-arrow-right"></i></button>
                </span> 
            </div>
        </form>
    </div>
</div>

