<ul class="navbar-nav ml-auto">
    @foreach ($items as $menu_item)
        <li><a href="{{ $menu_item->link() }}" class="py-1 d-block"><span class="ion-ios-arrow-forward mr-3"></span>{{ $menu_item->title }}</a>
    @endforeach
</ul>
