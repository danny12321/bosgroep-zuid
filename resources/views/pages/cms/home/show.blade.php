@extends('layouts.cms')

@section('content')
    <div class="m-card">
        <h1>Home pagina wijzigen</h1>
        <table class="m-table">
            <thead>
                <th>Instelling</th>
                <th></th>
            </thead>
            <tbody>
                <tr class="clickable hover last-hover" onclick="document.location = '{{ route('cms_homepage_HomeText') }}';">
                    <td>Tekst</td>
                    <td class="m-table__edit">
                        <a href="{{ route('cms_homepage_HomeText') }}"><i class="fas fa-edit"></i></a>
                    </td>
                </tr>
                
                <tr class="clickable hover last-hover" onclick="document.location = '{{ route('cms_homepage_HomeImage') }}';">
                    <td>Afbeelding</td>
                    <td class="m-table__edit">
                        <a href="{{ route('cms_homepage_HomeImage')}}"><i class="fas fa-edit"></i></a>
                    </td>
                </tr>
                <tr class="clickable hover last-hover" onclick="document.location = '{{ route('cms_homepage_GeoServer') }}';">
                    <td>GeoServer</td>
                    <td class="m-table__edit">
                        <a href="{{ route('cms_homepage_GeoServer') }}"><i class="fas fa-edit"></i></a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection