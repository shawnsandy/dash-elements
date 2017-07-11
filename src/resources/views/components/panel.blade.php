<aside class="panel">
    <div class="panel-body">
        <p class="{{ $heading  or "h2" }} title text-uppercase">
            {{ Html::dashIcons((isset($icon)) ?  $icon : "circle-o") }} {{ $title or "" }}
        </p>
        <hr>
        {{ $slot }}
    </div>
</aside>
