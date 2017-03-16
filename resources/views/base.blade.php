<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta id="token" name="token" value="{{ csrf_token() }}">
        @yield("meta")
        <title>
        Carnetizacion
        </title>
        <link href="{{ asset('assets/css/style.default.css')}}" rel="stylesheet">
        <link href="{{ asset('assets/js/jqueryui/jquery.alerts.css')}}" rel="stylesheet">
        <link href="{{ asset('assets/css/select2.css')}}" rel="stylesheet">
        <link href="{{ asset('assets/css/sweetalert.css')}}" rel="stylesheet">
        <link href="{{ asset('assets/css/jquery.gritter.css')}}" rel="stylesheet">
        <link href="{{ asset('assets/css/bootstrap-timepicker.min.css')}}" rel="stylesheet">
        <link href="{{ asset('assets/css/jquery.tagsinput.css')}}" rel="stylesheet" />
        <link href="{{ asset('assets/css/toggles.css')}}" rel="stylesheet" />
        <link href="{{ asset('assets/css/colorpicker.css')}}" rel="stylesheet" />
        <link href="{{ asset('assets/css/dropzone.css')}}" rel="stylesheet" />
        <style type="text/css">
        .rotar {
            -webkit-transform: rotate(-90deg);
            transform: rotate(-90deg);
}       </style>

          @yield('css')
    </head>

    <body>
        
        <header>
            <div class="headerwrapper">
                <div class="header-left">
                    <a href="#" style="color: white; font-size: 20px;"class="logo">
                        <i class="fa fa-graduation-cap"></i> UNERMB
                    </a>
                    <div class="pull-right">
                        <a href="#" class="menu-collapse">
                            <i class="fa fa-bars"></i>
                        </a>
                    </div>
                </div><!-- header-left -->
                
                <div class="header-right">
                        <span style="margin-bottom: 0px; color: white; font-size: 20px;">
                        Carnets UNERMB
                        </span>

                    <div class="pull-right">  
                        <div class="btn-group btn-group-option">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                              <i class="fa fa-caret-down"></i>
                            </button>
                            <ul class="dropdown-menu pull-right" role="menu">
                              <li><a href="#"><i class="glyphicon glyphicon-user"></i>Perfil</a></li>
                              <li class="divider"></li>
                              @if(Auth::check())
                              <li><a  href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="glyphicon glyphicon-log-out"></i>Cerrar Sesión</a></li>
                               <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                              @endif
                            </ul>
                        </div><!-- btn-group -->
                        
                    </div><!-- pull-right -->
                    
                </div><!-- header-right -->
                
            </div><!-- headerwrapper -->
        </header>
        
        <section>
            <div class="mainwrapper">
                <div class="leftpanel">
                    <div class="media profile-left">
                    @if(Auth::check())
                    <a class="pull-left profile-thumb" href="/usuarios/perfil/{{Auth::user()->id}}">
                    @else
                    <a class="pull-left profile-thumb" href="#">
                    @endif
                    <div class="img-circle"  id="profileImage"></div>
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">
                            @if(Auth::check())
                            <?php 
                            $nombres = explode(" ", Auth::user()->name); 
                            
                            ?>

                                    <span id="firstName">{!! $nombres[0] !!} 
                            
                            </h4>
                            <small class="text-muted">Ultima sesión: {!!date("d/m/Y - H:m:s", strtotime(Auth::user()->updated_at)) !!}</small>
                            @else
                                <?php   
                                        if(Session::has('nombres')){
                                            $nombres = explode(" ", Session::get('nombres')); 
                                        }
                                        if(Session::has('apellidos')){
                                            $apellidos = explode(" ", Session::get('apellidos'));
                                        }                            
                                        ?>
                                        @if(Session::has('nombres'))
                                        <span id="firstName">{!! $nombres[0] !!}
                                        @endif
                            
                            </h4>
                            @endif
                        </div>
                    </div><!-- media -->
                    <h5 class="leftpanel-title">Menú Principal</h5>
                    <ul class="nav nav-pills nav-stacked">
                        <li {{ (Request::is('/') ? ' class=active' : '') }}><a href="{{ URL::to('/') }}"><i class="fa fa-home"></i> <span>Principal</span></a></li>

                    </ul>
                    <ul class="nav nav-pills nav-stacked">
                        <li {{ (Request::is('/') ? ' class=inactive' : '') }}><a href="{{ URL::to('/carnetsp') }}"><i class="fa fa-id-card"></i> <span>Generar Carnet</span></a></li>

                    </ul>
                    <ul class="nav nav-pills nav-stacked">
                        <li {{ (Request::is('/') ? ' class=inactive' : '') }}><a href="{{ URL::to('/pagos') }}"><i class="fa fa-money"></i> <span>Pagos</span></a></li>

                    </ul>
                    <ul class="nav nav-pills nav-stacked">
                        <li {{ (Request::is('/') ? ' class=inactive' : '') }}><a href="{{ URL::to('/reporte') }}"><i class="fa fa-bar-chart"></i> <span>Reporte</span></a></li>

                    </ul>                   
                     <ul class="nav nav-pills nav-stacked">
                        <li {{ (Request::is('/') ? ' class=inactive' : '') }}><a href="{{ URL::to('/usuarios') }}"><i class="fa fa-users"></i> <span>Usuarios</span></a></li>

                    </ul>
                    <!--<ul class="nav nav-pills nav-stacked">
                        <li {{ (Request::is('/') ? ' class=inactive' : '') }}><a href="{{ URL::to('/archivodigital') }}"><i class="fa fa-upload "></i> <span>Archivo Digital</span></a></li>

                    </ul>-->
                    <br><br><center>
                    <img src="img/logo1.png" width="60%">
                    </center>
                </div><!-- leftpanel -->
                
                <div class="mainpanel">
                    <div class="pageheader">
                        <h4>@yield('modulo')</h4> 
                    </div><!-- pageheader -->
                    <div class="contentpanel" id="app">
                      @yield('contenido')
                    <!--PAGINA PRINCIPAL-->
                

                    </div><!-- contentpanel -->
                    
                </div><!-- mainpanel -->
            </div><!-- mainwrapper -->
        </section>


        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/jquery-migrate-1.2.1.min.js"></script>
        <script src="js/jquery-ui-1.10.3.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/modernizr.min.js"></script>
        <script src="js/pace.min.js"></script>
        <script src="js/retina.min.js"></script>
        <script src="js/jquery.cookies.js"></script>

        <script src="js/jquery.autogrow-textarea.js"></script>
        <script src="js/jquery.mousewheel.js"></script>
        <script src="js/jquery.tagsinput.min.js"></script>
        <script src="js/toggles.min.js"></script>
        <script src="js/bootstrap-timepicker.min.js"></script>
        <script src="js/jquery.maskedinput.min.js"></script>
        <script src="js/select2.min.js"></script>
        <script src="js/colorpicker.js"></script>
        <script src="js/dropzone.min.js"></script>

        <script src="js/custom.js"></script>
        <script>
            jQuery(document).ready(function() {

                // Tags Input
                jQuery('#tags').tagsInput({width:'auto'});

                // Textarea Autogrow
                jQuery('#autoResizeTA').autogrow();
                
                // Spinner
                var spinner = jQuery('#spinner').spinner();
                spinner.spinner('value', 0);
                
                // Form Toggles
                jQuery('.toggle').toggles({on: true});
                
                // Time Picker
                jQuery('#timepicker').timepicker({defaultTIme: false});
                jQuery('#timepicker2').timepicker({showMeridian: false});
                jQuery('#timepicker3').timepicker({minuteStep: 15});
                
                // Date Picker
                jQuery('#datepicker').datepicker();
                jQuery('#datepicker1').datepicker();
                jQuery('#datepicker-inline').datepicker();
                jQuery('#datepicker-multiple').datepicker({
                    numberOfMonths: 3,
                    showButtonPanel: true
                });
                
                // Input Masks
                jQuery("#date").mask("99/99/9999");
                jQuery("#phone").mask("(999) 999-9999");
                jQuery("#ssn").mask("999-99-9999");
                
                // Select2
                jQuery("#select-basic, #select-multi").select2();
                jQuery('#select-search-hide').select2({
                    minimumResultsForSearch: -1
                });
                
                function format(item) {
                    return '<i class="fa ' + ((item.element[0].getAttribute('rel') === undefined)?"":item.element[0].getAttribute('rel') ) + ' mr10"></i>' + item.text;
                }
                
                // This will empty first option in select to enable placeholder
                jQuery('select option:first-child').text('');
                
                jQuery("#select-templating").select2({
                    formatResult: format,
                    formatSelection: format,
                    escapeMarkup: function(m) { return m; }
                });
                
                // Color Picker
                if(jQuery('#colorpicker').length > 0) {
                    jQuery('#colorSelector').ColorPicker({
                        onShow: function (colpkr) {
                            jQuery(colpkr).fadeIn(500);
                            return false;
                        },
                        onHide: function (colpkr) {
                            jQuery(colpkr).fadeOut(500);
                            return false;
                        },
                        onChange: function (hsb, hex, rgb) {
                            jQuery('#colorSelector span').css('backgroundColor', '#' + hex);
                            jQuery('#colorpicker').val('#'+hex);
                        }
                    });
                }

                // Color Picker Flat Mode
                jQuery('#colorpickerholder').ColorPicker({
                    flat: true,
                    onChange: function (hsb, hex, rgb) {
                        jQuery('#colorpicker3').val('#'+hex);
                    }
                });
                
                
            });
</script>



        <script src="{{asset('assets/js/vue.js')}}"></script>
        <script src="{{asset('assets/js/vue-resource.min.js')}}"></script>
        <script type="text/javascript">
            Vue.http.headers.common['X-CSRF-TOKEN'] = $("#token").attr("value");
        </script>

    

          @yield('scripts')

          <script type="text/javascript">
            $(document).ready(function(){
                      var firstName = $('#firstName').text();
                      var lastName = $('#lastName').text();
                      var intials = $('#firstName').text().charAt(0) + $('#lastName').text().charAt(0);
                      var profileImage = $('#profileImage').text(intials);
                    });
          </script>


    </body>
</html>