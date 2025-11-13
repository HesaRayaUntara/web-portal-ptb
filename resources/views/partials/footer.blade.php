@php($footer = __('site.footer'))

<div class="footer-inner">
    <div class="footer-card">
        <h4>{{ $footer['contact_title'] }}</h4>
        <ul>
            <li>{{ $footer['address'] }}</li>
            <li>{{ $footer['phone'] }}</li>
            <li>{{ $footer['email'] }}</li>
            <li>{{ $footer['office_hours'] }}</li>
        </ul>
    </div>
    <div class="footer-card">
        <h4>{{ $footer['info_title'] }}</h4>
        <ul>
            @foreach($footer['info_items'] as $item)
                <li>{{ $item }}</li>
            @endforeach
        </ul>
    </div>
    <div class="footer-card">
        <h4>{{ $footer['follow_title'] }}</h4>
        <div class="socials">
            <a href="#" aria-label="{{ $footer['social']['instagram'] }}">IG</a>
            <a href="#" aria-label="{{ $footer['social']['youtube'] }}">YT</a>
            <a href="#" aria-label="{{ $footer['social']['facebook'] }}">FB</a>
            <a href="#" aria-label="{{ $footer['social']['linkedin'] }}">IN</a>
        </div>
    </div>
    <div class="footer-card">
        <h4>{{ $footer['collab_title'] }}</h4>
        <div class="footer-partners">
            @foreach($footer['partners'] as $partner)
                <span>{{ $partner }}</span>
            @endforeach
        </div>
    </div>
</div>
