<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        ===
        This comment should NOT be removed.

        Charisma v2.0.0

        Copyright 2012-2014 Muhammad Usman
        Licensed under the Apache License v2.0
        http://www.apache.org/licenses/LICENSE-2.0

        http://usman.it
        http://twitter.com/halalit_usman
        ===
    -->
    <meta charset="utf-8">
    <title>Daftar Users - Sistem Manajemen Arsip</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
    <meta name="author" content="Muhammad Usman">

    <!-- The styles -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap-cerulean.min.css">

    <link href="<?php echo base_url().'assets/css/';?>charisma-app.css" rel="stylesheet">
    <link href='<?php echo base_url().'assets/bower_components/fullcalendar/dist/';?>fullcalendar.css' rel='stylesheet'>
    <link href='<?php echo base_url().'assets/bower_components/fullcalendar/dist/';?>fullcalendar.print.css' rel='stylesheet' media='print'>
    <link href='<?php echo base_url().'assets/bower_components/chosen/';?>chosen.min.css' rel='stylesheet'>
    <link href='<?php echo base_url().'assets/bower_components/colorbox/example3/';?>colorbox.css' rel='stylesheet'>
    <link href='<?php echo base_url().'assets/bower_components/responsive-tables/';?>responsive-tables.css' rel='stylesheet'>
    <link href='<?php echo base_url().'assets/bower_components/bootstrap-tour/build/css/';?>bootstrap-tour.min.css' rel='stylesheet'>
    <link href='<?php echo base_url().'assets/css/';?>jquery.noty.css' rel='stylesheet'>
    <link href='<?php echo base_url().'assets/css/';?>noty_theme_default.css' rel='stylesheet'>
    <link href='<?php echo base_url().'assets/css/';?>elfinder.min.css' rel='stylesheet'>
    <link href='<?php echo base_url().'assets/css/';?>elfinder.theme.css' rel='stylesheet'>
    <link href='<?php echo base_url().'assets/css/';?>jquery.iphone.toggle.css' rel='stylesheet'>
    <link href='<?php echo base_url().'assets/css/';?>uploadify.css' rel='stylesheet'>
    <link href='<?php echo base_url().'assets/css/';?>animate.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/';?>maps-app.css">

    <!-- jQuery -->
    <script src="<?php echo base_url()?>assets/bower_components/jquery/jquery.min.js"></script>

    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- The fav icon -->
    <link rel="shortcut icon" href="<?php echo base_url().'assets/img/';?>favicon.ico">
</head>

<body>
    <!-- topbar/header -->
        <?php echo $topbar;?>
    <!-- end topbar-->

<div class="ch-container">
    <div class="row">
        
        <!--Menu Navigasi-->
            <?php echo $navigasi;?>
        <!--End Navigasi-->

        <noscript>
            <div class="alert alert-block col-md-12">
                <h4 class="alert-heading">Warning!</h4>

                <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a>
                    enabled to use this site.</p>
            </div>
        </noscript>

        <div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
            <div>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">SisMA</a>
                    </li>
                    <li>
                        <a href="#">Pengaturan</a>
                    </li>
                    <li>
                        <a href="#">Daftar Users</a>
                    </li>
                </ul>
            </div>

            <div class="row">
                <div class="box col-md-12">
                    <div class="box-inner">
                        <div class="box-header well" data-original-title="">
                            <h2><i class="glyphicon glyphicon-star-empty"></i> Daftar Users</h2>

                            <div class="box-icon">
                                <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                        class="glyphicon glyphicon-chevron-up"></i></a>
                                <a href="#" class="btn btn-close btn-round btn-default"><i
                                        class="glyphicon glyphicon-remove"></i></a>
                            </div>
                        </div>
                        <div class="box-content">
                            <table class="table table-striped table-bordered responsive">
                                <thead>
                                    <tr>
                                        <th id="tengah">ID</th>
                                        <th id="tengah">Nama Lengkap</th>
                                        <th id="tengah">Alamat</th>
                                        <th id="tengah">Email</th>
                                        <th id="tengah">Nomor Telp</th>
                                        <th id="tengah">Tempat Lahir</th>
                                        <th id="tengah">Tanggal Lahir</th>
                                        <th id="tengah">Username</th>
                                        <th id="tengah">Role</th>
                                        <th id="tengah" width="15%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($dafusers as $us) { ?>
                                <tr>
                                    <td id="tengah"><?php echo $us['id']; ?></td>
                                    <td id="tengah"><?php echo $us['nama']; ?></td>
                                    <td id="tengah"><?php echo $us['alamat']; ?></td>
                                    <td id="tengah"><?php echo $us['email']; ?></td>
                                    <td id="tengah"><?php echo $us['nohp']; ?></td>
                                    <td id="tengah"><?php echo $us['tpt_lahir']; ?></td>
                                    <td id="tengah"><?php echo $us['tgl_lahir']; ?></td>
                                    <td id="tengah"><?php echo $us['username']; ?></td>
                                    <td id="tengah"><?php echo $us['role']; ?></td>
                                   
                                    <td id="tengah">
                                        <a class="btn btn-success" href="<?php echo base_url().'users/detuser/'.$us['id'];?>">
                                            <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                            
                                        </a>
                                        <a class="btn btn-info" href="<?php echo base_url().'users/edit_user/'.$us['id'];?>">
                                            <i class="glyphicon glyphicon-edit icon-white"></i>
                                            
                                        </a>
                                        <a class="btn btn-danger" href="<?php echo base_url().'users/del_user/'.$us['id'];?>"
                                            onclick="return confirm('Yakin Akan dihapus ?');">
                                            <i class="glyphicon glyphicon-trash icon-white"></i>
                                            
                                        </a>
                                    </td>
                                </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                            <a class="btn btn-success" href="<?php echo base_url().'users/add_users';?>">
                                Tambah      
                            </a>
                        </div>
                    </div>
                </div>
            </div><!--/row-->
            <!-- content ends -->
        </div><!--/#content.col-md-0-->
    </div><!--/fluid-row-->

    <hr>

    <!-- MODAL -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3>Settings</h3>
                </div>
                <div class="modal-body">
                    <p>Here settings can be configured...</p>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                    <a href="#" class="btn btn-primary" data-dismiss="modal">Save changes</a>
                </div>
            </div>
        </div>
    </div>
    <!-- END MODAL -->

    <footer class="row">
        <p class="col-md-9 col-sm-9 col-xs-12 copyright">&copy; <a href="http://usman.it" target="_blank">Muhammad
                Usman</a> 2012 - 2015 || redesign @jakarta 2015</p>

        <p class="col-md-3 col-sm-3 col-xs-12 powered-by">Powered by: <a
                href="http://usman.it/free-responsive-admin-template">Charisma</a></p>
    </footer>

</div><!--/.fluid-container-->

<!-- external javascript -->

<script src="<?php echo base_url().'assets/bower_components/bootstrap/dist/js/';?>bootstrap.min.js"></script>

<!-- library for cookie management -->
<script src="<?php echo base_url().'assets/js/';?>jquery.cookie.js"></script>
<!-- calender plugin -->
<script src='<?php echo base_url().'assets/bower_components/moment/min/';?>moment.min.js'></script>
<script src='<?php echo base_url().'assets/bower_components/fullcalendar/dist/';?>fullcalendar.min.js'></script>
<!-- data table plugin -->
<script src='<?php echo base_url().'assets/js/';?>jquery.dataTables.min.js'></script>

<!-- select or dropdown enhancer -->
<script src="<?php echo base_url().'assets/bower_components/chosen/';?>chosen.jquery.min.js"></script>
<!-- plugin for gallery image view -->
<script src="<?php echo base_url().'assets/bower_components/colorbox/';?>jquery.colorbox-min.js"></script>
<!-- notification plugin -->
<script src="<?php echo base_url().'assets/js/';?>jquery.noty.js"></script>
<!-- library for making tables responsive -->
<script src="<?php echo base_url().'assets/bower_components/responsive-tables/';?>responsive-tables.js"></script>
<!-- tour plugin -->
<script src="<?php echo base_url().'assets/bower_components/bootstrap-tour/build/js/';?>bootstrap-tour.min.js"></script>
<!-- star rating plugin -->
<script src="<?php echo base_url().'assets/js/';?>jquery.raty.min.js"></script>
<!-- for iOS style toggle switch -->
<script src="<?php echo base_url().'assets/js/';?>jquery.iphone.toggle.js"></script>
<!-- autogrowing textarea plugin -->
<script src="<?php echo base_url().'assets/js/';?>jquery.autogrow-textarea.js"></script>
<!-- multiple file upload plugin -->
<script src="<?php echo base_url().'assets/js/';?>jquery.uploadify-3.1.min.js"></script>
<!-- history.js for cross-browser state change on ajax -->
<script src="<?php echo base_url().'assets/js/';?>jquery.history.js"></script>
<!-- application script for Charisma demo -->
<script src="<?php echo base_url();?>assets/js/charisma.js"></script>
<!-- Google Maps API -->
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js"></script>
<!-- JavaScript Maps-->
<script type="text/javascript" src="<?php echo base_url().'assets/js/';?>maps-app.js"></script>


</body>
</html>
