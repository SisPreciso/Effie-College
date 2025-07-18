<head>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,500;0,600;0,700;1,300;1,500;1,700&display=swap">
</head>
<body style="font-family:'Poppins',sans-serif;font-weight:200;color:#777;line-height:1.3em;">
<main>
    <div
        style="content:'';width:70%;background-image:url('https://effie-college.effie-peru.com/images/fondo.svg');background-repeat:no-repeat;background-position-x:right;background-position-y:bottom;opacity:0.5;position:absolute;top:0;bottom:0;right:0;z-index:-1"></div>
    <div style="width:100%;min-height:100vh;padding:15px;">
        <header
            style="display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;width:100%;max-width:1199px;margin:0 auto 20px;">
            <center>
                <img src="{{ asset('images/effie-college-2024.png') }}" style="width:150px;padding:0 30px;">
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
                                    <b>Hola, Equipo {{ $team }}</b>
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
                    Queremos informarles que, hubo un error al momento de enviar los correos con la información y enlaces 
                    para las sesiones de briefing con las marcas. Es por ello que este lunes 23 enviaremos nuevos enlaces 
                    según la marca que les corresponda.
                    </p>
                    <p style="color:#808080;margin:0;padding-bottom:15px;font-size:16px">
                        Lamentamos cualquier inconveniente que esto pueda causar y agradecemos su comprensión. 
                        A continuación, compartimos los horarios de las reuniones virtuales según la marca a la que 
                        se hayan inscrito:
                    </p>
                </td>

            </tr>
            <tr>
            <table border="1" cellspacing="1" cellpadding="3" align="center" style="
    font-size: 16px;
    margin-bottom: 16px;
">
                    <tbody><tr>
                        <td>MARCA</td>
                        <td>DÍA</td>
                        <td>HORARIO</td>
                    </tr>
                    <tr>
                        <td>Bolívar</td>
                        <td>Miércoles 25</td>
                        <td>9:00-10:00 AM</td>
                    </tr>
                    <tr>
                        <td>Margarinas Alicorp</td>
                        <td>Miércoles 25</td>
                        <td>10:30-11:30 AM</td>
                    </tr>
                    <tr>
                        <td>Entel</td>
                        <td>Miércoles 25</td>
                        <td>12:00-1:00 PM</td>
                    </tr>
                    <tr>
                        <td>Yape</td>
                        <td>Miércoles 25</td>
                        <td>3:00-4:00 PM</td>
                    </tr>
                    <tr>
                        <td>Pilsen Callao</td>
                        <td>Miércoles 25</td>
                        <td>4:30-5:30 PM</td>
                    </tr>
                    <tr>
                        <td>Latam Airlines</td>
                        <td>Miércoles 25</td>
                        <td>6:00-7:00 PM</td>
                    </tr>
            </tbody>
        </table>

            </tr>
            <tr>
                <td style="padding-right:20px;padding-left:20px">
                    <p style="color:#808080;margin:0;padding-bottom:15px;font-size:16px">Estaremos atentos a cualquier consulta. ¡Gracias por su paciencia y comprensión!</p>
                    <p style="color:#808080;margin:0;padding-bottom:15px;font-size:16px">Saludos cordiales,</p>
                    <p style="color:#cbb27c;margin:0;padding-bottom:20px;font-size:16px">
                        <b>El equipo de Effie<sup>®</sup> College Perú</b>
                    </p>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</main>
</body>
