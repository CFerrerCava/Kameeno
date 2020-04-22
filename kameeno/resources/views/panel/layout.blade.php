 <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />

  <link rel="icon" href="{!! asset('img/icono.png') !!}" type="image/png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
   Intranet
  </title>
  <style>
/* Center the loader */
#loader {
  position: absolute;
  left: 50%;
  top: 50%;
  z-index: 1;
  width: 150px;
  height: 150px;
   
 
}
 

#app {
  display: none;
  text-align: center;
}
</style>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
 
  <link rel="stylesheet" href="{!! asset('assets_panel/css/bootstrap.min.css') !!}">
  <link rel="stylesheet" href="{!! asset('assets_panel/css/now-ui-dashboard.css') !!}">
  <link rel="stylesheet" href="{!! asset('assets_panel/js/plugins/datatables/jquery.dataTables.min.css') !!}">  
  <link rel="stylesheet" href="{!! asset('assets_panel/js/plugins/datatables/dataTables.bootstrap4.css') !!}">  
  
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="dark">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <!-- <a href="http://www.creative-tim.com" class="simple-text logo-mini">
        <img src="{{ asset('imagenes/foto.JPG') }}" alt="mi foto">
        </a> -->
        
        <img src="{{ asset('assets_panel/img/LOGO WEB.jpg') }}" alt="mi foto">
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">        
        <ul class="nav  " id="accordion">         
           
          <li class=" " id="li_3">
            <a   href="{{url('contenido2')}}"  onclick="return Active('3');">
              <i class="now-ui-icons design-2_ruler-pencil"></i>
              <p  >Gestor de contenidos</p>
            </a>           
          </li>
          <li class=" " id="li_1" >
            <a href="{{url('perfiles')}}"  onclick="return Active('1');">
              <i class="now-ui-icons users_circle-08"></i>
              <p>Crear perfiles</p>
            </a>
          </li>
         
          <!--
          <li class=" " id="li_7">
            <a href="{{url('alquiler')}}"  onclick="return Active('4');">
              <i class="now-ui-icons shopping_cart-simple"></i>
              <p>Alquiler</p>
            </a>
          </li>
          <li class=" " id="li_8">
            <a href="{{url('cerroblanco')}}"  onclick="return Active('5');">
              <i class="now-ui-icons media-1_album"></i>
              <p>Cerro Blanco</p>
            </a>
          </li> -->


        </ul>
      </div>
    </div>
    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>

          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
             
            <ul class="navbar-nav">
              
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="now-ui-icons users_single-02"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li>
               
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="panel-header panel-header-sm">

      </div>
      <div class="content">
        @yield('content')
      </div>
      <footer class="footer">
        <div class=" container-fluid ">
        
          <div class="copyright" id="copyright">
            &copy; <script>
              document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script>,<a href="#" style=" color: green" target="_blank">Nortec</a>.
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script type="text/javascript" src="{!! asset('assets_panel/js/core/jquery.min.js') !!}" ></script>
  <script type="text/javascript" src="{!! asset('assets_panel/js/plugins/perfect-scrollbar.jquery.min.js') !!}" ></script>
  <script type="text/javascript" src="{!! asset('assets_panel/js/core/popper.min.js') !!}" ></script>
  <script type="text/javascript" src="{!! asset('assets_panel/js/core/bootstrap.min.js') !!}" ></script>
  <!--  Google Maps Plugin    -->
  <!--
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    -->
  <!-- Chart JS -->
  <script type="text/javascript" src="{!! asset('assets_panel/js/plugins/chartjs.min.js') !!}" ></script>
  <!--  Notifications Plugin    -->
  <script type="text/javascript" src="{!! asset('assets_panel/js/plugins/bootstrap-notify.js') !!}" ></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script type="text/javascript" src="{!! asset('assets_panel/js/now-ui-dashboard.min.js?v=1.5.0') !!}" ></script>
  <!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script type="text/javascript" src="{!! asset('assets_panel/demo/demo.js') !!}" ></script>
  
 
  <script>
    $(document).ready(function() {
      demo.initDashboardPageCharts();
  });
  </script>
    
<script language="javascript">
        function doSearch()
        {
            const tableReg = document.getElementById('tabla');
            const searchText = document.getElementById('txt_Buscar').value.toLowerCase();
            let total = 0;
 
            // Recorremos todas las filas con contenido de la tabla
            for (let i = 1; i < tableReg.rows.length; i++) {
                // Si el td tiene la clase "noSearch" no se busca en su cntenido
                if (tableReg.rows[i].classList.contains("noSearch")) {
                    continue;
                }
 
                let found = false;
                const cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
                // Recorremos todas las celdas
                for (let j = 0; j < cellsOfRow.length && !found; j++) {
                    const compareWith = cellsOfRow[j].innerHTML.toLowerCase();
                    // Buscamos el texto en el contenido de la celda
                    if (searchText.length == 0 || compareWith.indexOf(searchText) > -1) {
                        found = true;
                        total++;
                    }
                }
                if (found) {
                    tableReg.rows[i].style.display = '';
                } else {
                    // si no ha encontrado ninguna coincidencia, esconde la
                    // fila de la tabla
                    tableReg.rows[i].style.display = 'none';
                }
            }
 
            // mostramos las coincidencias
            const lastTR=tableReg.rows[tableReg.rows.length-1];
            const td=lastTR.querySelector("td");
            lastTR.classList.remove("hide", "red");
            if (searchText == "") {
                lastTR.classList.add("hide");
            } else if (total) {
                td.innerHTML="Se ha encontrado "+total+" coincidencia"+((total>1)?"s":"");
            } else {
                lastTR.classList.add("red");
                td.innerHTML="No se han encontrado coincidencias";
            }
        }
    </script>
 
<script>
var myVar;

 

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("app").style.display = "block";
}
</script>
  @yield('script_abajo')
</body>

</html>
