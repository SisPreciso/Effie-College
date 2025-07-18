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
                <td style="padding-left:20px;padding-right:20px">
                    <table width="100%" cellspacing="0" cellpadding="0">
                        <tbody>
                        <tr>
                            <td>
                                <p style="color:#cbb27c;margin:0;padding-top:10px;padding-bottom:10px;font-size:16px">
                                    <b>Hola, Equipo {{ $userName }}!</b>
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
                        Les recordamos que el 26 setiembre de {{ $schedule }}, tendremos una reunión virtual para la
                        presentación del brief.
                    </p>
                    <p style="color:#808080;margin:0;padding-bottom:15px;font-size:16px">
                        Adjuntamos en este correo el archivo del brief.
                    </p>
                    <p style="color:#808080;margin:0;padding-bottom:15px;font-size:16px">
                        Les recomendamos llegar puntualmente para no perder ningún detalle y tener la oportunidad de
                        aclarar dudas sobre las exigencias del caso.
                    </p>
                    <hr>
                    <p style="color:#808080;margin:0;padding-bottom:15px;font-size:16px">
                        Reunión de Microsoft Teams
                    </p>
                    <p style="color:#808080;margin:0;padding-bottom:15px;font-size:16px">
                        Únanse a través de su ordenador, aplicación móvil o dispositivo de sala
                    </p>
                    <p style="color:#808080;margin:0;padding-bottom:15px;font-size:16px">
                        Haga clic aquí para unirse a la reunión <a href="{{ $meetingLink }}">{{ $meetingLink }}</a>
                    </p>
                    <ul style="color:#808080;margin:0;padding-bottom:15px;font-size:16px">
                        <li>
                            ID de la reunión: {{ $meetingId }}
                        </li>
                        <li>
                            Código de acceso: {{ $meetingCode }}
                        </li>
                    </ul>
                    <p style="color:#808080;margin:0;padding-bottom:15px;font-size:16px">
                        Descargar Teams<<a href="https://www.microsoft.com/en-us/microsoft-teams/download-app">https://www.microsoft.com/en-us/microsoft-teams/download-app</a>>
                        | Unirse en la web<<a href="https://www.microsoft.com/microsoft-teams/join-a-meeting">https://www.microsoft.com/microsoft-teams/join-a-meeting</a>>
                    </p>
                    <p style="color:#808080;margin:0;padding-bottom:15px;font-size:16px">
                        Infórmese<<a href="https://aka.ms/JoinTeamsMeeting">https://aka.ms/JoinTeamsMeeting</a>> |
                        Opciones de reunión<<a
                            href="https://teams.microsoft.com/meetingOptions/?organizerId=9af73aa4-5c4f-425a-8233-ba97fc5b3a45&tenantId=1092197f-937b-439b-a403-93295587e186&threadId=19_meeting_ZTFiOTNlMmItYWJiNC00NjRkLWI5NWUtMTg1NDEwNGU5MTMy@thread.v2&messageId=0&language=es-US">https://teams.microsoft.com/meetingOptions/?organizerId=9af73aa4-5c4f-425a-8233-ba97fc5b3a45&tenantId=1092197f-937b-439b-a403-93295587e186&threadId=19_meeting_ZTFiOTNlMmItYWJiNC00NjRkLWI5NWUtMTg1NDEwNGU5MTMy@thread.v2&messageId=0&language=es-US</a>>
                    </p>
                    <hr>
                </td>
            </tr>
            <tr>
                <td style="padding-right:20px;padding-left:20px">
                    <p style="color:#000000;margin:0;padding-bottom:15px;font-size:16px">
                        <b>*En caso se presente algún cambio en el horario, lo comunicaremos por esta vía.</b>
                    </p>
                    <p style="color:#000000;margin:0;padding-bottom:20px;font-size:16px">
                        ¡Mucho éxito!
                    </p>
                    <p style="color:#000000;margin:0;padding-bottom:20px;font-size:16px">
                        Atentamente,
                    </p>
                    <p style="color:#cbb27c;margin:0;padding-bottom:20px;font-size:16px">
                        <b>Claudia Vega</b>
                    </p>
                    <p style="color:#cbb27c;margin:0;padding-bottom:20px;font-size:16px">
                        <b>Coordinadora de Effie College Perú</b>
                    </p>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</main>
</body>
