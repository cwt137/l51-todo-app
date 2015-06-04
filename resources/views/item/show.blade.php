<li class="list-group-item {{ ($item->isCompleted) ? 'text-muted' : '' }}" data-id="{{ $item->id }}">
    <span class="badge">
        <span class="deleteItem glyphicon glyphicon-remove" aria-hidden="true"></span>
    </span>
    <span class="checkbox-inline">
        <label>
            <input type="checkbox" class="isCompleted" value="1" {{ ($item->isCompleted) ? 'checked="checked"' : '' }}>
            {{ $item->title }}
        </lable>
    </span>
</li>
