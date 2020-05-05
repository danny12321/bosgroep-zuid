@foreach ($measures as $measure)
        <div class="list-group-item">
            <span>{{ $measure->name }}</span>

            <form action="{{route('cms_measures_destroy', ['measure' => $measure->id, 'municipality' => $municipality->id])}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-link" type="submit">Verwijderen</button>
            </form>
        </div>
   
            @include('pages.cms.measures.list', ['measures' => $measures->children])
        </div>
@endforeach