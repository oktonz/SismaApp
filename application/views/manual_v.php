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
    <title>Manual - Sistem Manajemen Arsip</title>
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
                        <a href="#">Help</a>
                    </li>
                    <li>
                        <a href="#">Manual</a>
                    </li>
                </ul>
            </div>

            <div class="row">
                <div class="box col-md-12">
                    <div class="box-inner">
                        <div class="box-header well" data-original-title="">
                            <h2><i class="glyphicon glyphicon-star-empty"></i> System Requirement</h2>
                            <div class="box-icon">
                                <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a>
                                <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a>
                            </div>
                        </div>
                        <div class="box-content">
                            <h3>Spesifikasi Untuk menjalankan Sistem</h3>
                            <ol>
                                <li>Komputer PC Dual Core Proccessor</li>
                                <li>Xampp Server</li>
                                <li>Browser (Google Chrome)</li>
                                <li>Koneksi Internet</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="box col-md-12">
                    <div class="box-inner">
                        <div class="box-header well" data-original-title="">
                            <h2><i class="glyphicon glyphicon-star-empty"></i> Cara Input Data</h2>
                            <div class="box-icon">
                                <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a>
                                <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a>
                            </div>
                        </div>
                        <div class="box-content">
                            <h4>Index Arsip</h4>
                            <p>Merupakan data header untuk mengklasifikasi arsip-arsip berdasarkan judul besar dan instansi / direktorat / dsb. satu(1) index mewakili banyak pekerjaan</p>
                            <h4>Cara Input Index</h4>
                            <ol>
                                <li>Pada menu navigasi pilih input data,</li>
                                <li>Kemudian pilih index arsip,</li>
                                <li>Akan ditampilkan form pengisian index terdiri dari index, judul, instansi dan tanggal,</li>
                                <li>index akan ter-generate secara otomatis, user hanya perlu mengisi judul, instansi dan tanggal.</li>
                            </ol>
                            <h4>Ilustrasi</h4>
                            <p>
                                Terdapat data dengan judul PLTMH, instansi Direktorat Aneka EBK. didalam Judul dan instansi ini terdapat beberapa jenis pekerjaan.
                                Maka user hanya perlu meng-inputkan judul, instansi, dan tanggal pada saat meng-input index ini.
                            </p>
                            <hr/>
                            <h4>Pekerjaan</h4>
                            <p>Merupakan data arsip untuk mengelompokkan dokumen-dokumen arsip (seperti: Surat-surat, dokumen kontrak dll) yang bersangkutan dengan suatu pekerjaan / proyek ini.</p>
                            <h4>Cara Input Pekerjaan</h4>
                            <ol>
                                <li>Pada menu navigasi pilih input data,</li>
                                <li>Kemudian pilih pekerjaan (untuk dapat meng-input pekerjaan, sebelumnya sudah harus memilik index arsip tersimpan),</li>
                                <li>Setelahnya akan ditampilkan form untuk meng-input pekerjaan,</li>
                                <li>Pilih index arsip yang sesuai untuk pekerjaan / proyek yang akan di-input,</li>
                                <li>Selanjutnya nama pekerjaan, unit, tahun, daerah pekerjaan / proyek, dst,</li>
                                <li>Klik Simpan untuk menyimpan data yang telah terisi.</li>
                            </ol>
                            <h4>Ilustrasi</h4>
                            <ol>
                                <li>Terdapat pekerjaan dengan nama pekerjaan PLTMH 20 kW, instansi Direktorat Aneka EBK, 1 Unit, tahun 2011, dst.</li>
                                <li>Maka dalam meng-input pada form pekerjaan, user memilih index yang sesuai yaitu index arsip yang memiliki judul PLTMH dan instansi Direktorat Aneka EBK (misalnya index IDX-001).</li>
                                <li>Kemudian secara otomatis pekerjaan ini akan dimasukkan dalam kelompok Index IDX-001.</li>
                                <li>Lakukan Peng-inputan untuk field lainnya sampai selesai, dan simpan.</li>
                                <li>Dst, ada pekerjaan lagi dengan nama pekerjaan PLTMH 19.1 kW, instansi Direktorat Aneka EBK, 2 UNit, Tahun 2013,dst.</li>
                                <li>Maka Dalam memilih index arsip, user kembali memilih IDX-001, karena untuk instansi dan judul besar sama, dengan kata lain pada index IDX-001 terdapat dua(2) pekerjaan.</li>
                                <li>Ulangi No. 4.</li>
                            </ol>
                            <hr/>
                            <h4>Data Lokasi</h4>   
                            <p>Merupakan data mengenai lokasi-lokasi dokumen pada suatu pekerjaan yang di tampilkan menggunakan MAP. difungsikan untuk mengelompokkan data dokumen berdasarkan lokasi (ie. Kabupaten)</p>                                                 
                            <h4>Cara Input Data Lokasi</h4>
                            <ol>
                                <li>Pada menu navigasi Pilih Input Data,</li>
                                <li>Pilih Data Lokasi,</li>
                                <li>Akan Ditampilkan Map,</li>
                                <li>Pada map users dapat mencari nama lokasi atau tempat yang ingin disimpan di kotak pencarian atau dapat juga mencari secara langsung pada map menggunakan Mouse,</li>
                                <li>Setelah ditemukan Lokasi yang ingin di simpan, klik kanan pada lokasi sekitar map yang diinginkan maka akan di tampilkan form pengisian nama lokasi,</li>
                                <li>Isi Nama Lokasi yang sesuai, dan Klik Save Lokasi,</li>
                                <li>Apabila Salah Menandai dapat dengan langsung meng-klik remove Marker dan memilih lokasi baru.</li>
                            </ol>
                            <hr/>
                            <h4>Dokumen</h4>
                            <p>Dokumen diartikan segala bentuk surat menyurat, kontrak, persetujuan, pengajuan, dan dokumen-dokumen proyek atau pekerjaan yang bersangkutan.</p>
                            <h4>Input Dokumen</h4>
                            <ol>
                                <li>Pada menu navigasi pilih Input Data,</li>
                                <li>Pilih Dokumen,</li>
                                <li>Akan ditampilkan form pengisian untuk detail dokumen,</li>
                                <li>Nama pekerjaan artinya dokumen yang akan di-input milik pekerjaan / proyek yang bersangkutan,</li>
                                <li>Lengkapi atau isi field lain sesuai dengan dokumen yang akan di-input.</li>
                                <li>Scan dokumen dan upload pada tempat field yang tersedia,</li>
                                <li>Kemudian, info lokasi dokumen tersebut,</li>
                                <li>Lokasi merupakan lokasi dokumen berada yang dikelompokkan berdasarkan lokasi yang user input pada Map.</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="box col-md-12">
                    <div class="box-inner">
                        <div class="box-header well" data-original-title="">
                            <h2><i class="glyphicon glyphicon-star-empty"></i> View Data Arsip</h2>
                            <div class="box-icon">
                                <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a>
                                <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a>
                            </div>
                        </div>
                        <div class="box-content">
                            <h4>Daftar Arsip</h4>
                            <p>Pada daftar arsip menampilkan data arsip secara umum dan singkat secara keseluruhan. Dapat menghapus, edit dan view detail pada tombol yang tersedia.</p>
                            <p>View Detail akan menampilkan index, pekerjaan dan dokumen yang tersimpan. Pada tampilan detail dapat juga melihat detail, hapus, dan edit dokumen yang tersimpan.</p>
                            <p>Edit untuk mengkoreksi apabila ada kesalahan peng-inputan.</p>
                            <hr/>
                            <h4>Lokasi Dokumen</h4>
                            <p>Menampilkan daftar lokasi dari dokumen-dokumen yang tersimpan. Terdapat tombol untuk melihat lokasi dari dokumen bersangkutan secara detail, mengedit lokasi, dan menghapus lokasi.</p>
                            <p>Catatan: Jika lokasi dihapus maka secara otomatis dokumen yang tersimpan di lokasi tersebut juga terhapus.</p>
                            <hr/>
                            <h4>Maps</h4>
                            <p>merupakan Fitur pencarian dokumen tersimpan melalui peta. dokumen akan dikelompokkan secara per-daerah dalam peta sesuai dengan inputan lokasi pada sebelumnya.</p>
                            <p>Pada saat mengakses menu ini akan ditampilkan beserta Marker yang menyatakan suatu lokasi tertentu. User hanya perlu mengklik kiri marker tersebut dan klik dokumen, maka dokumen dari daerah tersebut akan ditampilkan.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content ends -->
        </div><!--/#content.col-md-0-->
    </div><!--/fluid-row-->

    <hr>

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

    <!--Footer-->
        <?php echo $footer;?>
    <!--end Footer-->
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
