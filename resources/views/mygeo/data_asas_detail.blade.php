{{-- {{ isset($permohonan) ? $permohonan->name : '' }} --}}
@if (isset($permohonan))
{{$permohonan->name}} <br>
{{$permohonan->tujuan}}
@endif
