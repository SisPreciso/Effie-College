<head>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,500;0,600;0,700;1,300;1,500;1,700&display=swap">
</head>

<body style="font-family:'Poppins',sans-serif;font-weight:200;color:#777;line-height:1.3em;">
    <main>
        <div
            style="content:'';width:70%;background-image:url('https://effie-college.effie-peru.com/images/fondo.svg');background-repeat:no-repeat;background-position-x:right;background-position-y:bottom;opacity:0.5;position:absolute;top:0;bottom:0;right:0;z-index:-1">
        </div>
        <div style="width:100%;min-height:100vh;padding:15px;">
            <header
                style="display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;width:100%;max-width:1199px;margin:0 auto 20px;">
                <center><img src="{{ asset('images/effie-collage-2022.png') }}" style="width:150px;padding:0 30px;">
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
                                            <p
                                                style="color:#cbb27c;margin:0;padding-top:10px;padding-bottom:10px;font-size:16px">
                                                <b>¡Hola, Equipo {{ $username }}!</b>
                                            </p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-right:20px;padding-left:20px;padding-top:10px">
                            @if ($brand != 'Eureka')
                                <p style="color:#808080;margin:0;padding-bottom:15px;font-size:16px">
                                    Estamos a unos días del cierre del plazo para enviar el formulario de participación. Ojo: es de suma importancia completarlo al 100% para que pueda ser examinado y validado por nuestro jurado de selección. La función estará habilitada hasta el <strong>domingo 15 de mayo</strong> a las 23:59 horas.
                                </p>
                                <p style="color:#808080;margin:0;padding-bottom:15px;font-size:16px">
                                    En caso de tener problemas para subir su caso o los archivos anexos, envíennos un mensaje con el link de WeTransfer directamente a sistemas@preciso.pe, dentro del plazo de inscripción, para ayudarlos en el proceso. Si el enlace llega fuera del plazo límite, no será tomado en cuenta.
                                </p>
                            @else
                                <p style="color:#808080;margin:0;padding-bottom:15px;font-size:16px">
                                    Estamos a unos días del cierre del plazo para enviar el formulario de participación. Ojo: es de suma importancia completarlo al 100% para que pueda ser examinado y validado por nuestro jurado de selección. La función estará habilitada hasta el <strong>martes 17 de mayo</strong> a las 23:59 horas. Como se les había comentado en un correo anterior, el plazo para los equipos inscritos con la marca Eureka se extendió hasta el martes 17 por retrasos en la reunión de briefing.
                                </p>
                                <p style="color:#808080;margin:0;padding-bottom:15px;font-size:16px">
                                    En caso de tener problemas para subir su caso o los archivos anexos, envíennos un mensaje con el link de WeTransfer directamente a sistemas@preciso.pe, <strong>dentro del plazo de inscripción</strong>, para ayudarlos en el proceso. Si el enlace llega fuera del plazo límite, no será tomado en cuenta.
                                </p>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-right:20px;padding-left:20px">
                            <p style="color:#808080;margin:0;padding-bottom:5px;font-size:16px">Atentamente,</p>
                            <p style="color:#cbb27c;margin:0;font-size:16px">Claudia Vega</p>
                            <p style="color:#cbb27c;margin:0;font-size:16px">Coordinadora Effie<sup>®</sup> College Perú
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
</body>
