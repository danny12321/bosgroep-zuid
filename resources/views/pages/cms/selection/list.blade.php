@foreach ($selections as $selection)
    @if ($selection->layer)
        <div class="list-group-item">
            {{ $selection->layer->name }}

            <form action="{{route('cms_selection_destroy', ['selection' => $selection->id])}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-link" type="submit">Verwijderen</button>
            </form>
        </div>
    @else
        <div href="#SubMenu{{$selection->id}}" class="list-group-item list-group-item-primary collapsed" data-toggle="collapse" data-parent="#SubMenu{{$selection->id}}">
            {{ $selection->name }}
            <i class="fa fa-caret-down"></i>

                
                <a href="{{route('cms_selection_folder_create', ['selection' => $selection->id]) }}" class="btn btn-link">Folder toevoegen</a>
                <a href="{{route('cms_selection_layer_create', ['selection' => $selection->id]) }}" class="btn btn-link">Laag toevoegen</a>
                <form action="{{route('cms_selection_destroy', ['selection' => $selection->id])}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-link" type="submit">Verwijderen</button>
                </form>
            </div>

        <div class="collapse list-group-submenu" id="SubMenu{{$selection->id}}">
            @include('pages.cms.selection.list', ['selections' => $selection->children])
        </div>
    @endif
@endforeach