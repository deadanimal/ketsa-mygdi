<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    {{-- <title>Confirm Muat Turun Data</title> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>

<body style="background-color: rgba(211, 211, 211, 0.907)">
    <form action="/berjayaMuatTurun" method="POST">

        <div
            class="d-flex aligns-items-center justify-content-center card w-50 position-absolute top-50 start-50 translate-middle">

            @csrf

            <div class="card-body">
                <div class="text-center">
                    <span class="fas fa-5x fa-check-circle" style="color: rgb(26, 184, 26);"></span>
                    <h2 class="mt-4">Adakah anda berjaya memuat turun data?</h2>
                </div>


                <div class="mt-4 mx-3">

                    @foreach ($data as $d)
                        <div class="form-check mt-2">
                            <input class="form-check-input" name="mohons[]" type="checkbox"
                                value="{{ $mohons[$loop->index] }}" id="flexCheckDefault{{ $loop->index }}">
                            <label class="form-check-label" for="flexCheckDefault{{ $loop->index }}">
                                {{ $loop->iteration }}) {{ $d }}
                            </label>
                        </div>
                    @endforeach
                </div>

                <div class="text-end mt-5">
                    <button type="submit" class="btn btn-success" href="/berjayaMuatTurun">Berjaya Muat Turun</button>
                    <button type="button" type="button" class="btn btn-danger" id="gagal">Gagal Muat Turun</button>
                </div>
            </div>

        </div>
    </form>
    <script>
        $("#gagal").click(function() {
            window.close();
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>
