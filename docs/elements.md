#Elements / Components

### Table Elelment / Component


__Collection Table Component__


```blade
    @component("dashelements::components.collection-table", ["data" => \App\User::all() ])
        <a href="/">View</a>
    @endcomponent    
```
 or 
 
 ```blade

        @php $data = \App\User::all() @endphp

        @component("dashelements::components.collection-table", ['data' => $data ])

            @slot('table_rows')
                @foreach($data as $rows)
                    <tr>
                        <td>{{ $rows->id }}</td>
                        <td>{{ $rows->name }}</td>
                        <td>{{ $rows->email }}</td>
                        <td>{{ $rows->created_at }}</td>
                        <td>{{ $rows->updated_at }}</td>
                        <td>{{ $rows->avatar }}</td>
                        <td>{{ $rows->role_id }}</td>
                        <td><a href="/{{$rows->role_id }}/edit">Edit</a></td>
                    </tr>
                @endforeach
            @endslot

        @endcomponent
```


```blade
    @component("dashelements::components.logout-btn")
        Logout Now
    @endcomponent
```
