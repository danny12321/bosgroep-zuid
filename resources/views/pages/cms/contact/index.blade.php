@extends('layouts.cms')

@section('content')
    <h1>Contact pagina wijzigen</h1>

    <p>Wat wilt u wijzigen aan de contact pagina?</p>
    <table class="m-table">
    <thead>
            <th>Name</th>
            <th></th>
        </thead>
        <tbody>
            <tr class="clickable" onclick="document.location = '{{ route('cms_Contactpage_feedback') }}';">
                    <td>Het feedback deel</td>
                    <td class="m-table__edit">
                        <a href="{{ route('cms_Contactpage_feedback') }}">Wijzig</a>
                    </td>
            </tr>
            
            <tr class="clickable" onclick="document.location = '{{ route('cms_Contactpage_contact') }}';">
                    <td>Contactinformatie</td>
                    <td class="m-table__edit">
                        <a href="{{ route('cms_Contactpage_contact')}}">Wijzig</a>
                    </td>
            </tr>
    </tbody>
    </table>
@endsection