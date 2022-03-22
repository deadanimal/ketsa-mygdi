<!DOCTYPE html>
<html>

<head>
    <title>document.pdf</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
</head>
<style>
    div {
        align-content.container: center;
    }

    h4.a {
        width: 100%;
        */ -ms-transform: rotate(-25deg);
        transform: rotate(-25deg);
        text-decoration: underline;
        position: absolute;
        top: 200px;
        left: -50px;
        opacity: 0.3;
        font-size: 24px;

    }

    /* Create two equal columns that floats next to each other */
    .column {
        float: left;
        width: 20%;
        padding: 10px;
        height: auto;
        /* Should be removed. Only for demonstration */
    }

    .column-auto {
        margin: auto 0;
        padding: auto 0;
        width: auto;
        padding: 10px;
        height: auto;
        /* Should be removed. Only for demonstration */
    }

    /* Clear floats after the columns */
    .row:after {
        content: "";
        display: table;
        clear: both;
        padding-top: 0px;
    }

</style>

<body>

    <div class="container pl-lg-8">
        <br><br><br><br>
        <div class="row pl-5 ml-5">
            <div class="column"></div>
            <div class="column">
                <img src="{{ $base64_front }}" class="text-center" alt="front pic" style="width: 300px;" />
                <br>
                <h4 class="a mt-0">UNTUK KEGUNAAN PGN SAHAJA</h4>
                <br><br><br><br>
                <img src="{{ $base64_back }}" class="text-center" alt="back pic" style="width: 300px;" />
            </div>
        </div><br>

    </div>
</body>

</html>
