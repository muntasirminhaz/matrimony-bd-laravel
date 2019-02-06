<div class="list-group">

    @foreach ($sidebarMenus as $url => $item)

    @foreach ($item as $route => $name)
        
    @endforeach
        <a href="{{ route($route) }}" class="list-group-item list-group-item-action {{ collect(request()->segments())->last() === $url ? 'active' : '' }}
        ">
            {{ $name }}
        </a>
    @endforeach
    





</div>
