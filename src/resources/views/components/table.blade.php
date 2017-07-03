@php

    $collection = collect($data)->first();
    $columns = collect($collection)->keys()->map(function($item){
return  "<td class=\"{$item}\">".ucwords(str_replace("_", " ", $item))."</td>";
});;

$records = json_decode(json_encode($data), true);

@endphp

<table class="table">
    <thead>
    <tr>
        @foreach($columns as $td)
            {!! $td !!}
        @endforeach
    </tr>
    </thead>
    <tbody>
    <tr>
        @foreach($records as $row => $key)
            {{--@if($data->first)--}}
            {{--<th scope="row">{{ $value }}</th>--}}
            {{ dump($key) }}
        @endforeach


    </tr>
    </tbody>
</table>
{{ dump( $records }}
