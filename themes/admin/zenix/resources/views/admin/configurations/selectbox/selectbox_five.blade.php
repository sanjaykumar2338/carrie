<form action="{{ route('language') }}" method="POST" id="theme-lang-id" >
    @csrf
    {{-- <select class="default-select dashboard-select image-select" name="language"  onchange="javascript:this.form.submit()">
        @php
            $language = DzHelper::getInstalledLanguage();
        @endphp
        @foreach ($language as $key =>$val )
            <option value="{{ $key }}" {{ (session()->get('language') && $key==session('language'))? 'selected' : '' }}>{{ $val }}</option>
        @endforeach

    </select> --}}
    {{-- {{dump($language)}} --}}
    {{-- <select class="form-control" name="language" data-width="fit" onchange="javascript:this.form.submit()">
        @forelse($language as $lang)
            <option @selected(session()->get('language') && $lang->language_code == session('language'))  data-item-title="{{ $lang->title }}" data-item-img="{{ theme_asset('images/logo.png') }}" value="{{ $lang->language_code }}">{{ $lang->title.' - '.$lang->country }}</option>
        @empty
        @endforelse
    </select> --}}

    <select class="form-control lang-dropdown-box" data-live-search="true" data-width="fit" name="language"  onchange="javascript:this.form.submit()">
        @forelse($records as $coun)
            {{-- @if(!empty($coun->languages)) --}}
                {{-- @forelse($coun->languages as $lang) --}}
                    <option @selected(session()->get('language') && $coun->language_code == session('language')) data-content=" <span class=''> {{ $coun->country.' - '.$coun->title }} </span>" value="{{ $coun->language_code }}">{{ $coun->country.' - '.$coun->title }}</option>
                {{-- @empty --}}
                {{-- @endforelse --}}
            {{-- @endif --}}
        @empty
        @endforelse
    </select>
</form>
