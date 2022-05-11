@extends('layouts.app_mygeo')

@section('content')
<style>
    .uper {
        margin-top: 40px;
    }
</style>

<div class="card uper">
    <div class="card-header">
        People 
    </div>
    <div class="card-body">
        <table class="container table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>country</th>
                </tr> 
            </thead>
            <tbody>
                @foreach($people as $p)
                <tr class="table-tr">
                    <td>
                        {{ $p->id }}
                    </td>
                    <td>
                        {{ $p->name }}
                    </td>
                    <td>
                        {{ $p->country }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@stop