<form action="{{ route('language') }}" method="POST" id="theme-lang-id" >
    @csrf
    {{-- <select class="default-select dashboard-select image-select" name="language"  onchange="javascript:this.form.submit()"> --}}
        {{-- <select class="form-control image-select dropdown_list lang-dropdown-img" data-width="fit" data-actions-box="true" name="language"  onchange="javascript:this.form.submit()">
            @forelse($language as $lang)
                @php  $file =($lang->country_code!=null) ? $lang->country_code : 'default';@endphp
                <option @selected(session()->get('language') && $lang->language_code == session('language')) value="{{ $lang->language_code }}" data-thumbnail="{{ theme_asset('/images/flags/32/'.$file.'.png') }}"  purchase-code="yes">{{ $lang->title }}</option>
            @empty
            @endforelse
        </select> --}}


        <select class="form-control image-select dropdown_list lang-dropdown-box lang-dropdown-img" data-live-search="true" data-width="fit" data-flag="true" name="language"  onchange="javascript:this.form.submit()">
            @forelse($records as $coun)
                {{-- @if(!empty($coun->languages)) --}}
                    {{-- @forelse($coun->languages as $lang) --}}
                    {{-- @if($lang->is_main == '1') --}}
                        @php $file =($coun->iso_code!=null) ? $coun->iso_code : 'default';  @endphp
                        <option @selected( session()->get('language') && $coun->language_code == session('language'))  value="{{ $coun->language_code }}" data-content="<img class='radius-xl'  src='{{ theme_asset('/images/flags/32/'.$file.'.png') }}'/> <span class='test test'>{{-- strtoupper($coun->country) --}}</span>"> {{-- $coun->country --}}</option>
                    {{-- @endif --}}
                    {{-- @empty --}}
                    {{-- @endforelse --}}
                {{-- @endif --}}
            @empty
            @endforelse
        </select>
</form>
