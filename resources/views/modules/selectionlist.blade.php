@foreach ($selections as $selection)
    @if ($selection->layer)
        <div class="list-group-item">
                <input type="checkbox" id="{{$selection->layer->name}}" name="{{$selection->layer->name}}" value="{{$selection->layer->name}}">
                <label for="{{$selection->layer->name}}">{{$selection->layer->title}}</label>
        </div>
    @else
        <div href="#SubMenu{{$selection->id}}" class="list-group-item list-group-item-primary collapsed" data-toggle="collapse" data-parent="#SubMenu{{$selection->id}}">
            {{ $selection->name }}
            <i class="fa fa-caret-down"></i>
        </div>

        <div class="collapse list-group-submenu" id="SubMenu{{$selection->id}}">
            @include('modules.selectionlist', ['selections' => $selection->children])
        </div>
    @endif
@endforeach