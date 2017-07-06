<aside class="panel {{ str_slug($title) }} {{ $attributes['class'] or "" }}">
    <div class="panel-body">
        <p class="h4 text-uppercase">
            <i class="fa {{ $attributes['icon'] or 'fa-circle-o' }}"></i> {{ $title or "" }}
        </p>
        <hr>
    </div>
</aside>
