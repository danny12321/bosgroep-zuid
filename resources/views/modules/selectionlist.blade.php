@foreach ($municipality->guide_species as $guideSpecie)
    <div href="#SubMenu{{$guideSpecie->id}}" class="list-group-item list-group-item-primary collapsed" data-toggle="collapse" data-parent="#SubMenu{{$guideSpecie->id}}">
        <span>{{ $guideSpecie->name }}<span>
        <i class="fa fa-caret-down"></i>
    </div>

    <div class="collapse list-group-submenu" id="SubMenu{{$guideSpecie->id}}">
        @foreach ($guideSpecie->layers as $layer)
            <div class="list-group-item">
                <input type="checkbox" id="{{$layer->name}}" name="{{$layer->name}}" value="{{$layer->name}}"{{ in_array($layer->id, $filters) ? 'checked' : ''}}>
                <label for="{{$layer->name}}">{{$layer->title}}</label>
            </div>
        @endforeach
    </div>
@endforeach

@if (count($municipality->layers_without_guidespecie))
    <div href="#SubMenu-overig" class="list-group-item list-group-item-primary collapsed" data-toggle="collapse" data-parent="#SubMenu-overig">
        <span>Overig<span>
        <i class="fa fa-caret-down"></i>
    </div>

    <div class="collapse list-group-submenu" id="SubMenu-overig">
        @foreach ($municipality->layers_without_guidespecie as $layer)
            <div class="list-group-item">
                <input type="checkbox" id="{{$layer->name}}" name="{{$layer->name}}" value="{{$layer->name}}"{{ in_array($layer->id, $filters) ? 'checked' : ''}}>
                <label for="{{$layer->name}}">{{$layer->title}}</label>
            </div>
        @endforeach
    </div>
@endif