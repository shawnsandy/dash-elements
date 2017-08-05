<aside class="panel">
    <div class="panel-body">
        <p class="{{ $heading  or "h2" }} title">
            {{ Html::dashIcons((isset($icon)) ?  $icon : "circle-o") }}
            <span class="small">{{ $title or "" }}</span>
        </p>
        <hr>
        {{ $slot }}
    </div>
</aside>
