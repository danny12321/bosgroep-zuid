@extends('layouts.cms')

@section('content')
<div class="m-card">
    <h1>Contact pagina wijzigen</h1>
    <table class="m-table">
        <thead>
            <th>Instelling</th>
            <th></th>
        </thead>
        <tbody>
            <tr class="clickable hover last-hover" onclick="document.location = '{{ route('cms_Contactpage_feedback') }}';">
                <td>Feedback e-mail</td>
                <td class="m-table__edit">
                    <a href="{{ route('cms_Contactpage_feedback') }}"><i class="fas fa-edit"></i></a>
                </td>
            </tr>
            
            <tr class="clickable hover last-hover" onclick="document.location = '{{ route('cms_Contactpage_contact') }}';">
                <td>Contactinformatie</td>
                <td class="m-table__edit">
                    <a href="{{ route('cms_Contactpage_contact')}}"><i class="fas fa-edit"></i></a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection