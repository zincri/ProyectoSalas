<!DOCTYPE html>
{% load static %}
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>Libroteca</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="{% static 'favicon.ico'%}" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="{% static 'css/theme-white.css'%}"/>
        
        <!-- EOF CSS INCLUDE -->                                   
    </head>
    <body>
        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            
            <!-- START PAGE SIDEBAR -->
            <div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    <li class="xn-logo">
                        <a href="#">BIBLIOTECA</a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>
                    <li class="xn-profile">
                        <a href="#" class="profile-mini">
                            <img src="{% static 'assets/images/users/avatar.jpg'%}" alt="Gerente"/>
                        </a>
                        <div class="profile">
                            <div class="profile-image">
                                <!--
                                <img src="{% static 'assets/images/users/avatar.jpg'%}" alt="Gerente"/>
                                -->
                            </div>
                            <div class="profile-data">
                                <div class="profile-data-name">{{user.username | upper}}</div>
                                <div class="profile-data-title">
                                    Prestador
                                </div>
                            </div>
                            <!--
                            <div class="profile-controls">
                                <a href="#" class="profile-control-left"><span class="fa fa-edit"></span></a>
                                <a href="#" class="profile-control-right"><span class="fa fa-cog"></span></a>
                            </div>
                            -->
                        </div>                                                                        
                    </li>
                    <li class="xn-title">Navegación</li>
                    <li class="active">
                        <a href="{% url 'inicio' %}"><span class="fa fa-desktop"></span> <span class="xn-text">Libros</span></a>                        
                    </li>                    
                    <li class="xn-openable">
                        <a href=""><span class="fa fa-file-text-o"></span> <span class="xn-text">Mis libros</span></a>
                        <ul>
                            <li><a href="{% url 'prestados' %}"><span class="fa fa-money"></span> Prestados</a></li>            
                        </ul>
                    </li>
                    
                    
                </ul>
                <!-- END X-NAVIGATION -->
            </div>
            <!-- END PAGE SIDEBAR -->
            
            <!-- PAGE CONTENT -->
            <div class="page-content">
                
                <!-- START X-NAVIGATION VERTICAL -->
                <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                    <!-- TOGGLE NAVIGATION -->
                    <li class="xn-icon-button">
                        <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                    </li>
                    <!-- END TOGGLE NAVIGATION -->
                    <!-- SEARCH -->
                    <li class="xn-search">
                        <form role="form">
                            <input type="text" name="search" placeholder="Search..."/>
                        </form>
                    </li>   
                    <!-- END SEARCH -->
                    <!-- SIGN OUT -->
                    <li class="xn-icon-button pull-right">
                        <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>                        
                    </li> 
                    <!-- END SIGN OUT -->
                    <!-- MESSAGES -->
                    <li class="xn-icon-button pull-right">
                        <a href="#"><span class="fa fa-comments"></span></a>
                        <div class="informer informer-danger">4</div>
                        <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
                            <div class="panel-heading">
                                <h3 class="panel-title"><span class="fa fa-comments"></span> Messages</h3>                                
                                <div class="pull-right">
                                    <span class="label label-danger">4 new</span>
                                </div>
                            </div>
                            <div class="panel-body list-group list-group-contacts scroll" style="height: 200px;">
                                
                            </div>     
                            <div class="panel-footer text-center">
                                <a href="pages-messages.html">Show all messages</a>
                            </div>                            
                        </div>                        
                    </li>
                    <!-- END MESSAGES -->
                    <!-- TASKS -->
                    <li class="xn-icon-button pull-right">
                        <a href="#"><span class="fa fa-tasks"></span></a>
                        <div class="informer informer-warning">3</div>
                        <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
                            <div class="panel-heading">
                                <h3 class="panel-title"><span class="fa fa-tasks"></span> Tasks</h3>                                
                                <div class="pull-right">
                                    <span class="label label-warning">3 active</span>
                                </div>
                            </div>
                            <div class="panel-body list-group scroll" style="height: 200px;">                                
                                                              
                            </div>     
                            <div class="panel-footer text-center">
                                <a href="pages-tasks.html">Show all tasks</a>
                            </div>                            
                        </div>                        
                    </li>
                    <!-- END TASKS -->
                </ul>
                <!-- END X-NAVIGATION VERTICAL -->                     

                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="">Home</a></li>                    
                    <li class="active">Dashboard</li>
                </ul>
                <!-- END BREADCRUMB -->                       
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    <!--AQUI EMPIEZA EL CONTENIDO-->
                    {% block content%}
                    {% endblock%}
                    <!--AQUI TERMINA EL CONTENIDO-->
                </div>
                <!-- END PAGE CONTENT WRAPPER -->                                
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>¿Estas seguro que quieres salir?</p>                    
                        <p>Preciona "No" si deseas continuar trabajando. Preciona "No" si deseas cerrar tu sesion.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="#" 
                            class="btn btn-success btn-lg"
                            onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">Yes</a>
                            <form id="logout-form" action="{% url 'logout' %}" method="POST" style="display: none;">
                                <!--AQUI VA EL TOKEN csrf-->
                                {% csrf_token %}
                            </form>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->



        <!-- START PRELOADS -->
        <audio id="audio-alert" src="{% static 'audio/alert.mp3'%}" preload="auto"></audio>
        <audio id="audio-fail" src="{% static 'audio/fail.mp3'%}" preload="auto"></audio>
        <!-- END PRELOADS -->                  
        
    <!-- START SCRIPTS -->
    
        <!-- START PLUGINS -->
        <script type="text/javascript" src="{% static 'js/plugins/jquery/jquery.min.js'%}"></script>
        <script type="text/javascript" src="{% static 'js/plugins/jquery/jquery-ui.min.js'%}"></script>
        <script type="text/javascript" src="{% static 'js/plugins/bootstrap/bootstrap.min.js'%}"></script>        
        <!-- END PLUGINS -->

        {% block extra_js %}
        {% endblock%}

        <!-- START THIS PAGE PLUGINS-->        
        <script type='text/javascript' src="{% static 'js/plugins/icheck/icheck.min.js'%}"></script>        
        <script type="text/javascript" src="{% static 'js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js'%}"></script>
        <script type="text/javascript" src="{% static 'js/plugins/scrolltotop/scrolltopcontrol.js'%}"></script>
        
        <script type="text/javascript" src="{% static 'js/plugins/morris/raphael-min.js'%}"></script>
        <script type="text/javascript" src="{% static 'js/plugins/morris/morris.min.js'%}"></script>       
        <script type="text/javascript" src="{% static 'js/plugins/rickshaw/d3.v3.js'%}"></script>
        <script type="text/javascript" src="{% static 'js/plugins/rickshaw/rickshaw.min.js'%}"></script>
        <script type='text/javascript' src="{% static 'js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'%}"></script>
        <script type='text/javascript' src="{% static 'js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'%}"></script>                
        <script type='text/javascript' src="{% static 'js/plugins/bootstrap/bootstrap-datepicker.js'%}"></script>                
        <script type="text/javascript" src="{% static 'js/plugins/owl/owl.carousel.min.js'%}"></script> 
        <script type="text/javascript" src="{% static 'js/plugins/bootstrap/bootstrap-file-input.js'%}"></script>
        <script type="text/javascript" src="{% static 'js/plugins/bootstrap/bootstrap-select.js'%}"></script>
                        
        
        <script type="text/javascript" src="{% static 'js/plugins/moment.min.js'%}"></script>
        <script type="text/javascript" src="{% static 'js/plugins/daterangepicker/daterangepicker.js'%}"></script>
        <!-- END THIS PAGE PLUGINS-->        
        <!-- THIS PAGE EVENTOS -->
        <script type="text/javascript" src="{% static 'js/plugins/datatables/jquery.dataTables.min.js'%}"></script>    
        <!-- END PAGE PLUGINS -->
        <!-- START TEMPLATE -->
        <script type="text/javascript" src="{% static 'js/settings.js'%}"></script>
        
        <script type="text/javascript" src="{% static 'js/plugins.js'%}"></script>        
        <script type="text/javascript" src="{% static 'js/actions.js'%}"></script>
        
        <script type="text/javascript" src="{% static 'js/demo_dashboard.js'%}"></script>
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->         
    </body>
</html>