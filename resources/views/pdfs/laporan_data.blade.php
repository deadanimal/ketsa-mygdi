<!DOCTYPE html>
<html>
    <head>
        <title>MyGeo Explorer</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      </head>
<style>

</style>

<body>
    <div class="content-wrapper" style="width:100%;">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="container pb-3">
                            <h3 class="text-center text-uppercase py-4">{{ $permohonan->name }}</h3>
                            <div class="row">
                                <div class="col-5">
                                    <b>Nama Pemohon :</b>
                                </div>
                                <div class="col-6">
                                    <p>{{ $permohonan->users->name }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-5">
                                    <b>Agensi :</b>
                                </div>
                                <div class="col-6">
                                    <p>{{ $permohonan->users->agensiOrganisasi->name }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-5">
                                    <b>E-mel :</b>
                                </div>
                                <div class="col-6">
                                    <p>{{ $permohonan->users->email }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-5">
                                    <b>Nombor Telefon :</b>
                                </div>
                                <div class="col-6">
                                    <p>{{ $permohonan->users->phone_bimbit }}</p>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-5">
                                    <b>Data Yang Dipohon :</b>
                                </div>
                                <div class="col-6">
                                    <ol class="mt-1">
                                        @foreach ($senarai_kawasan as $sk)
                                            <li>{{ $sk->lapisan_data }}</li>
                                        @endforeach
                                    </ol>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-5">
                                    <b>Tarikh Permohonan Data :</b>
                                </div>
                                <div class="col-6">
                                    <p>{{ Carbon\Carbon::parse($permohonan->created_at)->format('d/m/Y') }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-5">
                                    <b>Tarikh Penjanaan Laporan :</b>
                                </div>
                                <div class="col-6">
                                    <p>{{ Carbon\Carbon::parse($permohonan->updated_at)->format('d/m/Y') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
