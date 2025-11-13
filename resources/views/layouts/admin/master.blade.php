<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">{{-- 
    <link rel="icon" href="{{asset('assets/images/favicon.png')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" type="image/x-icon"> --}}
    <title>@yield('title')</title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <!-- Font Awesome-->
    @includeIf('layouts.admin.partials.css')
  </head>
  <body>
    <!-- Loader starts-->
    <div class="loader-wrapper">
      <div class="theme-loader"></div>
    </div>
    <!-- Loader ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-sidebar" id="pageWrapper">
      <!-- Page Header Start-->
      @includeIf('layouts.admin.partials.header')
      <!-- Page Header Ends -->
      <!-- Page Body Start-->
      <div class="page-body-wrapper sidebar-icon">
        <!-- Page Sidebar Start-->
        @includeIf('layouts.admin.partials.sidebar')
        <!-- Page Sidebar Ends-->
        <div class="page-body">
          <!-- Container-fluid starts-->
          <div class="mt-4">
          @yield('content')
          </div>
          <div class="modal left fade" id="logInfoModal" tabindex="-1" role="dialog" aria-labelledby="logInfoModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">

                  <div class="modal-header">
                    <h4 class="modal-title" id="logInfoModalLabel">Info</h4>
                    <button type="button" class="close btn btn-primary" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  </div>

                  <div class="modal-body">
                    <div id="kt_app_settings_content">
                      <div class="info_name_data">
                      </div>
                      <div class="log_info_data">
                        
                      </div>
                    </div>
                  </div>

                </div><!-- modal-content -->
              </div><!-- modal-dialog -->
            </div>
              <style type="text/css">
                .modal.left .modal-dialog{
                  margin: auto;
                  width: 100%;
                  height: 100%;
                  -webkit-transform: translate3d(0%, 0, 0);
                      -ms-transform: translate3d(0%, 0, 0);
                       -o-transform: translate3d(0%, 0, 0);
                          transform: translate3d(0%, 0, 0);
                }
                .modal.left .modal-content {
                  height: 100%;
                  overflow-y: auto;
                }
                
                .modal.left .modal-body {
                  padding: 15px 15px 80px;
                }

              /*Left*/
                .modal.left.fade .modal-dialog{
                  left: -414px;
                  -webkit-transition: opacity 0.3s linear, left 0.3s ease-out;
                     -moz-transition: opacity 0.3s linear, left 0.3s ease-out;
                       -o-transition: opacity 0.3s linear, left 0.3s ease-out;
                          transition: opacity 0.3s linear, left 0.3s ease-out;
                }
                
                .modal.left.fade.in .modal-dialog{
                  left: 0;
                }
              </style>
          <!-- Container-fluid Ends-->
        </div>
        <!-- footer start-->
        <footer class="footer">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6 footer-copyright">
                <p class="mb-0">Copyright {{date('Y')}}-{{date('y', strtotime('+1 year'))}} © All rights reserved.</p>
              </div>
              <div class="col-md-6">
                <p class="pull-right mb-0">Hand crafted & made with <i class="fa fa-heart font-secondary"></i></p>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <!-- latest jquery-->
    @includeIf('layouts.admin.partials.js')
  </body>
</html>