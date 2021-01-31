<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>codeSUM certifikat</title>
    <style>
        .main-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .child-container{
            font-family: cursive;
            border-radius: 15px;
            height: 480px;
            width: 700px;
            background: #e6ffff;
            line-height: 2;
            border-style: dashed;
        }
        .lesson-text {
            text-align: center;
        }

        .span1 {
            float: left;
            padding-left: 30px
        }

        .span2 {
            float: right;
            padding-right: 30px;
        }
    </style>
</head>
<body>

    <div class="main-container">
        <div class="child-container">
            <div class="lesson-text">
                <h1>C O D E <span style="color: darkorange"> S U M</span></h1>
                <h3>Certifikat programiranja</h3>
                <h3 >C E S T I T A M O!</h3>
                <h4>Uspijesno ste polozili tecaj</h4>
                <h2>{{ $user->name }}  {{ $user->surname }}</h2>
            </div>
            <div class="lesson-link">
                <div>
                    <span class="span1">
                        <p>______________</p>
                        <p>Clan codeSUM</p>
                    </span>
                    <span class="span2">
                        <p>______________</p>
                        <p>Ovlasteno lice</p>
                    </span>
                </div>
            </div>
        </div>
    </div>
</body>
</html>