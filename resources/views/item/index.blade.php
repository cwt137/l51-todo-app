<ul id="uncompletedItemsList" class="list-group">
    @foreach ($uncompletedItems as $item)
        @include('item.show')
    @endforeach
</ul>
<hr>
<ul id="completedItemsList" class="list-group">
    @foreach ($completedItems as $item)
        @include('item.show')
    @endforeach
</ul>

