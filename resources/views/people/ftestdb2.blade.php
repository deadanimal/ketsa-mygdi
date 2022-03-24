@extends('layouts.app_mygeo')

@section('content')
<style>
    .uper {
        margin-top: 40px;
    }
</style>

<div class="card uper">
    <div class="card-header">
        Ftest Metadata from different db 
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
            </tbody>
        </table>
    </div>
</div>

@stop