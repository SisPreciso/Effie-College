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
                     alt="Logo Effie College 2024">
            </center>
        </header>
        <table>
            <tbody>
            <tr>
                <td style="padding-left:20px;padding-right:20px">
                    <table width="100%" cellspacing="0" cellpadding="0">
                        <tbody>
                        <tr>
                            <td>
                                <p style="color:#cbb27c;margin:0;padding-top:10px;padding-bottom:10px;font-size:16px">
                                    
                                    <b>¡Hola, Equipo {{ $team }}!</b>
                                </p>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="padding-right:20px;padding-left:20px;padding-top:10px">
                    <p style="color:#808080;margin:0;padding-bottom:15px;font-size:16px">
                    El <b>25 de septiembre a las {{$meetingSchedule}} horas</b> tendremos nuestra reunión virtual para la presentación del brief de la marca {{$brand}}. 
                    {{ $representativeBrand}}, {{$positionCompany}} de {{$brand}}, será quien les revelará todos los detalles del desafío.
                    </p>
                    
                    <p style="color:#808080;margin:0;padding-bottom:15px;font-size:16px">
                        Pueden unirse a la reunión dando clic en el <b>siguiente enlace: {{$meetingLink}}</b>
                    </p>
                    
                    <p style="color:#808080;margin:0;padding-bottom:15px;font-size:16px">
                        Les recomendamos estar puntuales para no perderse nada y aprovechar para resolver
                        cualquier duda que tengan. ¡Es el momento de prepararse para lo que viene!
                    </p>
                    <p style="color:#808080;margin:0;padding-bottom:15px;font-size:16px">
                        Si hay algún cambio en el horario, se los comunicaremos por esta vía.
                    </p>
                    
                </td>
            </tr>
            <tr>
                <td style="padding-right:20px;padding-left:20px">
                    <p style="color:#808080;margin:0;padding-bottom:15px;font-size:16px">
                        ¡Muchos éxitos, equipo! 
                    </p>
                    <p style="color:#cbb27c;margin:0;padding-bottom:20px;font-size:16px">
                        <b>Atentamente,</b>
                    </p>
                    <p style="color:#cbb27c;margin:0;padding-bottom:20px;font-size:16px">
                        <b>Equipo Effie College</b>
                    </p>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</main>
</body>
