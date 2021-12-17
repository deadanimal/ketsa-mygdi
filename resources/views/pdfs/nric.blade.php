<!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<style>
    div {
        align-content.container: center;
    }

    h4.a {
        /* width: 150px;
        height: 80px;
        background-color: yellow; */
        -ms-transform: rotate(-25deg);
        /* IE 9 */
        transform: rotate(-25deg);
        text-decoration: underline;
        position: relative;
        left: -70px;
        top: 40px;
        opacity: 0.4;

    }

</style>

<body>

    <div class="container pl-lg-8">
        <br><br><br><br>
        <div class="row pl-5 ml-5">
            <div class="col-12">
                <img src="{{ $base64_front }}" class="text-center" alt="front pic" style="width: 300px;" />
                <br>
                <h4 class="a mt-0">UNTUK KEGUNAAN PGN SAHAJA</h4>
                <br><br>
                <img src="{{ $base64_back }}" class="text-center" alt="back pic" style="width: 300px;" />
            </div>
        </div><br>

    </div>
</body>

</html>
