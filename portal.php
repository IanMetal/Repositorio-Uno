<?php
// PortalPagosCoahuila_frontend.php
// Front-end single-file para portal de pagos en línea (HTML + CSS + JS + PHP)
// Diseñado para uso educativo. No procesa pagos reales.

// Simple router dentro del mismo archivo para mantener el "enlace funcional" a Control Vehicular
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

// Datos de ejemplo para recibo
$recibo = [
    'folio' => 'F-' . date('Ymd') . rand(100,999),
    'fecha' => date('Y-m-d H:i:s'),
    'servicio' => 'Pago de ejemplo',
    'monto' => '1,200.00',
    'contribuyente' => 'Juan Perez'
];

?><!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Portal de Pagos - Estado de Coahuila de Zaragoza</title>
  <style>
    :root{--accent:#00559a;--accent-2:#0072c6;--muted:#666}
    *{box-sizing:border-box}
    body{font-family:Inter, system-ui, Arial, sans-serif;margin:0;background:#f5f7fb;color:#222}
    header{background:linear-gradient(90deg,var(--accent),var(--accent-2));color:#fff;padding:14px 20px;display:flex;align-items:center;gap:16px}
    .logo{display:flex;align-items:center;gap:12px}
    .logo img{height:56px}
    .title{font-size:18px;font-weight:700}
    .subtitle{font-size:12px;opacity:.9}
    main{padding:20px;max-width:1200px;margin:18px auto}
    .grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(240px,1fr));gap:16px}
    .card{background:#fff;border-radius:12px;padding:16px;box-shadow:0 6px 18px rgba(10,20,30,.06);display:flex;flex-direction:column;justify-content:space-between}
    .card h3{margin:0 0 8px;font-size:16px}
    .card p{margin:0 0 12px;color:var(--muted);font-size:13px}
    .btn{display:inline-block;padding:10px 12px;border-radius:10px;text-decoration:none;border:none;background:var(--accent-2);color:#fff;font-weight:600;cursor:pointer}
    .btn.ghost{background:transparent;color:var(--accent-2);border:1px solid rgba(0,0,0,.06)}
    .top-actions{display:flex;gap:8px;align-items:center}
    .search{padding:10px;border-radius:10px;border:1px solid #e6e9ef;min-width:220px}
    footer{max-width:1200px;margin:16px auto;padding:18px;color:#666}
    /* modal/printer */
    .modal{position:fixed;inset:0;display:none;align-items:center;justify-content:center;background:rgba(0,0,0,.5);z-index:80}
    .modal .panel{background:#fff;padding:18px;border-radius:8px;max-width:720px;width:95%}
    .print-area{background:#fff;padding:18px;border-radius:6px}
    @media(max-width:520px){header{padding:12px} .logo img{height:46px}}
  </style>
  <script>
    function openModal(id){
      document.getElementById('modal').style.display='flex';
      document.getElementById('modal-content').innerHTML = document.getElementById(id).innerHTML;
    }
    function closeModal(){document.getElementById('modal').style.display='none'}
    function imprimirAreaHtml(html){
      const w = window.open('', '_blank');
      w.document.write('<html><head><title>Imprimir</title></head><body>'+html+'</body></html>');
      w.document.close();
      w.focus();
      setTimeout(()=>{w.print();},300);
    }
    function imprimirRecibo(){
      const contenido = document.getElementById('recibo-html').innerHTML;
      imprimirAreaHtml(contenido);
    }
  </script>
</head>
<body>
<header>
  <div class="logo">
    <!-- Sustituya 'assets/logo_coahuila.png' por la ruta real del logotipo del Estado de Coahuila de Zaragoza -->
    <img src="assets/logo_coahuila.png" alt="Escudo del Estado de Coahuila de Zaragoza" onerror="this.onerror=null;this.src='data:image/svg+xml;utf8,<svg xmlns=%22http://www.w3.org/2000/svg%22 width=%22120%22 height=%2256%22><rect fill=%22%2300559a%22 width=%22120%22 height=%2256%22 rx=%228%22 /><text x=%2260%22 y=%2234%22 font-size=%2212%22 fill=%22white%22 text-anchor=%22middle%22 font-family=%22Arial%22>Coahuila de Zaragoza</text></svg>'">
    <div>
      <div class="title">Portal de Pagos - Coahuila</div>
      <div class="subtitle">Servicios gubernamentales en línea</div>
    </div>
  </div>
  <div style="flex:1"></div>
  <div class="top-actions">
    <input class="search" placeholder="Buscar servicio..." oninput="buscar(this.value)">
    <button class="btn" onclick="openModal('ayuda')">Ayuda</button>
  </div>
</header>

<main>
<?php if($page === 'control_vehicular'): ?>
  <!-- Página interna Control Vehicular: enlace funcional dentro del mismo archivo -->
  <section class="card" style="margin-bottom:18px;">
    <h2>Control Vehicular</h2>
    <p>Trámites y pagos relacionados con control vehicular.</p>
    <form method="post" action="?page=control_vehicular" onsubmit="alert('Este es un ejemplo: aquí se enviaría la solicitud al backend');">
      <label>Placa o folio:<br><input name="placa" required style="padding:8px;border-radius:6px;border:1px solid #e6e9ef;width:260px"></label>
      <div style="margin-top:12px;display:flex;gap:8px;align-items:center">
        <button class="btn" type="submit">Continuar pago</button>
        <a class="btn ghost" href="./">Volver al inicio</a>
      </div>
    </form>
  </section>
  <section class="card">
    <h3>Imprimir refrendo vehicular con firma electrónica</h3>
    <p>Genera un comprobante listo para imprimir y firmar electrónicamente.</p>
    <button class="btn" onclick="imprimirRecibo()">Imprimir refrendo</button>
  </section>
  <!-- Ejemplo de recibo -->
  <div id="recibo-html" style="display:none">
    <div style="font-family:Arial;padding:18px;max-width:680px;border:1px solid #efefef">
      <h2>Refrendo Vehicular - Estado de Coahuila</h2>
      <p>Folio: <?php echo $recibo['folio']; ?></p>
      <p>Fecha: <?php echo $recibo['fecha']; ?></p>
      <p>Contribuyente: <?php echo $recibo['contribuyente']; ?></p>
      <p>Servicio: Refrendo vehicular</p>
      <p>Monto: $<?php echo $recibo['monto']; ?> MXN</p>
      <hr>
      <p>Este documento sirve como comprobante de pago de ejemplo. No es válido para efectos fiscales reales.</p>
    </div>
  </div>

<?php else: ?>
  <section style="margin-bottom:18px;display:flex;gap:12px;flex-wrap:wrap;align-items:center">
    <div style="flex:1;min-width:240px">
      <h1>Bienvenido al Portal de Pagos del Estado de Coahuila</h1>
      <p style="color:var(--muted);max-width:640px">Selecciona el servicio que deseas pagar. Este front-end es un ejemplo educativo para la asignatura de Programación Web.</p>
    </div>
    <div style="display:flex;gap:8px;">
      <!-- El botón "Control Vehicular" enlaza a la misma página con page=control_vehicular (enlace funcional) -->
      <a class="btn" href="?page=control_vehicular">Control Vehicular</a>
      <button class="btn ghost" onclick="openModal('contacto')">Contacto</button>
    </div>
  </section>

  <div class="grid">
    <!-- Lista de servicios solicitados por el usuario -->
    <?php
      $servicios = [
        ['id'=>'licencias','title'=>'Licencias de Conducir','desc'=>'Renovación y expedición de licencias.','action'=>'?page=licencias'],
        ['id'=>'impuesto_nomina','title'=>'Impuestos sobre Nómina','desc'=>'Pago y comprobantes de impuesto sobre nómina.','action'=>'?page=impuesto_nomina'],
        ['id'=>'impuesto_hospedaje','title'=>'Impuesto sobre Hospedaje','desc'=>'Declaración y pago de hospedaje.','action'=>'?page=impuesto_hospedaje'],
        ['id'=>'isan','title'=>'ISAN','desc'=>'Impuesto sobre automóviles nuevos (ISAN).','action'=>'?page=isan'],
        ['id'=>'instituto_registral','title'=>'Instituto Registral Catastral','desc'=>'Servicios catastrales y consultas.','action'=>'?page=instituto_registral'],
        ['id'=>'registro_civil','title'=>'Registro Civil','desc'=>'Actas, certificados y trámites civiles.','action'=>'?page=registro_civil'],
        ['id'=>'licencia_alcoholes','title'=>'Licencia de Alcoholes','desc'=>'Trámites de permisos y licencias.','action'=>'?page=licencia_alcoholes'],
        ['id'=>'secretaria_educacion','title'=>'Secretaría de Educación','desc'=>'Pagos y servicios educativos.','action'=>'?page=secretaria_educacion'],
        ['id'=>'continuar_tramite','title'=>'Continuar trámite inconcluso','desc'=>'Recupera y continúa trámites guardados.','action'=>'?page=continuar_tramite'],
        ['id'=>'registro_vehicular_redes','title'=>'Registro vehículos redes de transporte','desc'=>'Alta de vehículos para plataformas de transporte.','action'=>'?page=registro_vehicular_redes'],
        ['id'=>'imprimir_refrendo','title'=>'Imprimir refrendo vehicular (firma electrónica)','desc'=>'Imprime tu refrendo con opción de firma electrónica.', 'action'=>'#'],
        ['id'=>'imprimir_recibo','title'=>'Imprimir recibo de código y comprobante fiscal','desc'=>'Recibo y comprobante fiscal general (ejemplo).','action'=>'#'],
      ];
      foreach($servicios as $s):
    ?>
      <div class="card" id="card-<?php echo $s['id']; ?>">
        <h3><?php echo $s['title']; ?></h3>
        <p><?php echo $s['desc']; ?></p>
        <div style="display:flex;gap:8px;align-items:center">
          <?php if($s['action'] === '#'): ?>
            <button class="btn" onclick="openModal('<?php echo $s['id']; ?>-info')">Abrir</button>
          <?php else: ?>
            <a class="btn" href="<?php echo $s['action']; ?>">Abrir</a>
          <?php endif; ?>
          <button class="btn ghost" onclick="openModal('<?php echo $s['id']; ?>-info')">Detalles</button>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <!-- Contenidos de modal por servicio (ejemplos rápidos) -->
  <div id="licencias-info" style="display:none">
    <h3>Licencias de Conducir</h3>
    <p>Renovación, pérdida, y requisitos. Ejemplo de formulario para iniciar trámite.</p>
    <form onsubmit="alert('Formulario de ejemplo: enviar al servidor');return false;">
      <label>Nombre:<br><input required style="padding:8px;border-radius:6px;border:1px solid #e6e9ef;width:100%"></label>
      <div style="margin-top:8px"><button class="btn" type="submit">Iniciar trámite</button></div>
    </form>
  </div>

  <div id="imprimir_refrendo-info" style="display:none">
    <h3>Imprimir refrendo vehicular</h3>
    <p>Pulsa el botón para generar un documento imprimible con firma electrónica (ejemplo).</p>
    <button class="btn" onclick="imprimirRecibo()">Generar e imprimir</button>
  </div>

  <div id="imprimir_recibo-info" style="display:none">
    <h3>Imprimir recibo y comprobante fiscal</h3>
    <p>Ejemplo de recibo con datos fiscales. Use esto solo como maqueta; el comprobante fiscal real debe generarse desde el sistema fiscal autorizado (CFDI / SAT).</p>
    <button class="btn" onclick="openModal('recibo-ejemplo')">Ver comprobante</button>
  </div>

<?php endif; ?>
</main>

<!-- Modal genérico -->
<div id="modal" class="modal" onclick="if(event.target.id==='modal')closeModal()">
  <div class="panel" id="modal-content">
    <!-- contenido dinámico -->
  </div>
</div>

<!-- Contenidos ocultos reutilizables -->
<div id="ayuda" style="display:none">
  <h3>Ayuda y soporte</h3>
  <p>Para soporte técnico comuníquese al 01-800-XXX-XXXX o al correo soporte@coahuila.gob.mx (ejemplo).</p>
</div>

<div id="contacto" style="display:none">
  <h3>Contacto</h3>
  <p>Oficinas centrales: Saltillo, Coahuila.</p>
</div>

<div id="recibo-ejemplo" style="display:none">
  <div class="print-area">
    <h2>Comprobante Fiscal General (Ejemplo)</h2>
    <p><strong>Folio:</strong> <?php echo $recibo['folio']; ?></p>
    <p><strong>Fecha:</strong> <?php echo $recibo['fecha']; ?></p>
    <p><strong>Servicio:</strong> <?php echo $recibo['servicio']; ?></p>
    <p><strong>Monto:</strong> $<?php echo $recibo['monto']; ?> MXN</p>
    <p>Este comprobante es un ejemplo. Para emitir un CFDI real el sistema debe integrar el PAC y timbrado fiscal del SAT.</p>
  </div>
</div>

<footer>
  <small>Portal de Pagos - Estado de Coahuila de Zaragoza — Ejemplo educativo. No procesar pagos reales desde este código.</small>
</footer>
</body>
</html>
