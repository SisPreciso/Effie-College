$(() => {
  new jBox('Tooltip', {
    attach: '#btn-brief',
    theme: 'TooltipDark',
    position: {
      x: 'center',
      y: 'top'
    },
    content: 'Descargar brief (PDF)'
  });

  new jBox('Tooltip', {
    attach: '#btn-audio',
    theme: 'TooltipDark',
    position: {
      x: 'center',
      y: 'top'
    },
    content: 'Descargar audio (MP4)'
  });

  new jBox('Tooltip', {
    attach: '#btn-visual',
    theme: 'TooltipDark',
    position: {
      x: 'center',
      y: 'top'
    },
    content: 'Descargar key visual (ZIP)'
  });

  new jBox('Tooltip', {
    attach: '#btn-whole',
    theme: 'TooltipDark',
    position: {
      x: 'center',
      y: 'top'
    },
    content: 'Descargar kit completo (ZIP)'
  });

  new jBox('Tooltip', {
    attach: '#btn-refresh',
    theme: 'TooltipDark',
    position: {
      x: 'center',
      y: 'top'
    },
    content: 'Actualizar listado de equipos'
  });
  
    // Nombre del archivo (grabación)
    new jBox('Tooltip', {
        attach: '#btn-recording',
        theme: 'TooltipDark',
        position: {
            x: 'center',
            y: 'top'
        },
        content: 'Descargar video (MP4)'
    });

    // Nombre del archivo ()
    new jBox('Tooltip', {
        attach: '#btn-graphics',
        theme: 'TooltipDark',
        position: {
            x: 'center',
            y: 'top'
        },
        content: 'Descargar materiales gráficos (ZIP)'
    });
});
