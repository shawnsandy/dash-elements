#Elements / Components

### Table Elelment / Component


__Collection Table__
 
```blade
    @component("dashelements::components.collection-table", ["data" => \App\User::all() ])
        <a href="/">View</a>
    @endcomponent    
```


```blade
    @component("dashelements::components.logout-btn")
        Logout Now
    @endcomponent
```
