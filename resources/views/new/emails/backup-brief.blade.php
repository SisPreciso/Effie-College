<head>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,500;0,600;0,700;1,300;1,500;1,700&display=swap">
    <title></title>
</head>
<body style="font-family:'Poppins',sans-serif;font-weight:200;color:#777;line-height:1.3em;">
<main>
    <div
        style="content:'';width:70%;background-image:url('https://effie-college.effie-peru.com/images/fondo.svg');background-repeat:no-repeat;background-position-x:right;background-position-y:bottom;opacity:0.5;position:absolute;top:0;bottom:0;right:0;z-index:-1"></div>
    <div style="width:100%;min-height:100vh;padding:15px;">
        <header
            style="display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;width:100%;max-width:1199px;margin:0 auto 20px;">
            <center>
                <img src="{{ asset('images/effie-college-2024.png') }}" style="width:150px;padding:0 30px;"
                     alt="Logo Effie College 2023">
            </center>
        </header>
        <table>
            <tbody>
            <tr>
                <td style="padding-right:20px;padding-left:20px;padding-top:10px">
                    <p style="color:#808080;margin:0;padding-bottom:15px;font-size:16px">
                        Estimados participantes, la organización de Effie Perú les da la bienvenida a Effie College
                        {{ now()->year }}.
                    </p>
                    <p style="color:#808080;margin:0;padding-bottom:15px;font-size:16px">
                        El siguiente paso es que reciban la información sobre el desafío que
                        <strong>{{ $brandName }}</strong> está
                        planteando
                        para ustedes. Los representantes de la marca les explicarán en detalle el brief y ustedes
                        podrán hacer preguntas en la reunión virtual del <strong>martes 26 de septiembre</strong> de
                        <strong>{{ $schedule }}</strong>.
                        Un día antes de esta reunión les enviaremos el enlace para conectarse y también el brief para
                        que lo lean con anticipación.
                    </p>
                    <p style="color:#808080;margin:0;padding-bottom:15px;font-size:16px">
                        No es obligatorio que estén todos los integrantes del equipo. Si no pueden asistir, les
                        compartiremos la grabación.
                    </p>
                </td>
            </tr>
            <tr>
                <td style="padding-right:20px;padding-left:20px">
                    <p style="color:#808080;margin:0;padding-bottom:15px;font-size:16px">
                        <b>Estamos en contacto,</b>
                    </p>
                    <p style="color:#cbb27c;margin:0;padding-bottom:20px;font-size:16px">
                        <b>Claudia Vega</b>
                    </p>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</main>
</body>
