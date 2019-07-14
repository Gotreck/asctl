<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<style type = "text/css">
    html {
        font-family: "Helvetica Neue", sans-serif;
    }

    .header {
        text-align: center;
        font-size: 22px;
        font-weight: bold;
        padding-bottom: 12px;
        color: #BB1A37;
    }

    .footer-text {
        font-size: 12px;
        line-height: 16px;
        color: #aaaaaa;
    }

    .footer-text a {
        color: #aaaaaa;
    }

    .container {
        width: 800px;
        max-width: 800px;
    }

    .container-padding {
        padding-left: 24px;
        padding-right: 24px;
    }

    .content {
        padding-top: 12px;
        padding-bottom: 12px;
        background-color: #ffffff;
    }

    code {
        padding: 0 4px;
        font-family: Menlo, Courier, monospace;
        font-size: 12px;
    }

    hr {
        border: 0;
        border-bottom: 1px solid #cccccc;
    }

    .hr {
        height: 1px;
        border-bottom: 1px solid #cccccc;
    }

    .title {
        font-size: 14px;
        font-weight: 600;
        color: #374550;
    }

    .subtitle {
        font-size: 16px;
        font-weight: 600;
        color: #2469A0;
    }

    .subtitle span {
        font-weight: 400;
        color: #999999;
    }

    .body-text {
        font-family: Helvetica, Arial, sans-serif;
        font-size: 14px;
        line-height: 20px;
        text-align: left;
        color: #333333;
    }

    a[href^="x-apple-data-detectors:"],
    a[x-apple-data-detectors] {
        color: inherit !important;
        text-decoration: none !important;
        font-size: inherit !important;
        font-family: inherit !important;
        font-weight: inherit !important;
        line-height: inherit !important;
    }
</style>

<html lang = "fr">

<head>
    <meta http-equiv = "Content-Type" content = "text/html; charset=UTF-8">
    <title>Ticket Email</title>
</head>

<body style = "margin:0; padding:0;">

<!-- 100% background wrapper (grey background) -->
<table border = "0" width = "100%" cellpadding = "0" cellspacing = "0" bgcolor="white">
    <tr>
        <td align = "center" valign = "top" >
            <br>
            <!-- 600px container (white background) -->
            <table border = "0" width = "800" cellpadding = "0" cellspacing = "0" class = "container">
                <tr>
                    <td class = "container-padding content" align = "left">
                        <br>

                        <div >{{__("Guten Tag")}}</div>
                        <br>

                        <div class = "body-text">
                            {{__("Wir freuen uns, deine Bestellung zu bestätigen.")}}
                            <br>{{__("Du findest die Rechnung unter folgendem Link und im Anhang dieser E-Mail:")}}
                            <br><br><a href = "http://10-anniversary-aikido-switzerland.ch/order/old">http://10-anniversary-aikido-switzerland.ch/order</a>
                            <br>

                            <br><br>
                            {{__("Herzlich dein AS-Team")}}
                            <br><br>
                            <table style = 'font-family: Arial ; font-size:13px'>
                                <tr>

                                    <td align = "center">
                                        <img src = "{{asset('\image\E-Mail Signatur.png')}}" alt = "signature">
                                    </td>
                                </tr>
                            </table>
                        </div>

                    </td>
                </tr>
                <tr>
                    <td class = "container-padding footer-text" align = "left">
                    </td>
                </tr>
            </table><!--/600px container -->


        </td>
    </tr>
</table><!--/100% background wrapper-->

</body>
</html>


