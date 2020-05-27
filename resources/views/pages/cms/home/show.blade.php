@extends('layouts.cms')

@section('content')
    <h1>Home pagina wijzigen</h1>

    <p>Wat wilt u wijzigen aan de home pagina?</p>
    <table class="m-table">
    <thead>
            <th>Name</th>
            <th></th>
        </thead>
        <tbody>
            <tr class="clickable" onclick="document.location = '{{ route('cms_homepage_HomeText') }}';">
                    <td>Tekst</td>
                    <td class="m-table__edit">
                        <a href="{{ route('cms_homepage_HomeText') }}">Wijzig</a>
                    </td>
            </tr>
            
            <tr class="clickable" onclick="document.location = '{{ route('cms_homepage_HomeImage') }}';">
                    <td>afbeelding</td>
                    <td class="m-table__edit">
                        <a href="{{ route('cms_homepage_HomeImage')}}">Wijzig</a>
                    </td>
            </tr>
            <tr class="clickable" onclick="document.location = '{{ route('cms_homepage_GeoServer') }}';">
                    <td>GeoServer</td>
                    <td class="m-table__edit">
                        <a href="{{ route('cms_homepage_GeoServer') }}">Wijzig</a>
                    </td>
            </tr>
    </tbody>
    </table>
@endsection