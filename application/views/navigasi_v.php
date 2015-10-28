<!DOCTYPE HTML>
<html>
	<head><title>Header</title></head>
	<body>
		<!-- left menu starts -->
        <div class="col-sm-2 col-lg-2">
            <div class="sidebar-nav">
                <div class="nav-canvas">
                    <div class="nav-sm nav nav-stacked">

                    </div>
                    <ul class="nav nav-pills nav-stacked main-menu">
                        <li class="nav-header">Menu Navigasi</li>
                        <li><a class="ajax-link" href="<?php echo base_url().'home';?>"><i class="glyphicon glyphicon-home"></i><span> Home</span></a>
                        </li>
                        <li><a class="ajax-link" href="<?php echo base_url().'arsip';?>"><i class="glyphicon glyphicon-eye-open"></i><span> Daftar Arsip</span></a>
                        </li>
                        <li class="accordion">
                            <a href="#"><i class="glyphicon glyphicon-plus"></i><span> Input Data</span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="<?php echo base_url().'input';?>">Index Arsip</a></li>
                                <li><a href="<?php echo base_url().'peta';?>">Data Lokasi</a></li>
                                <li><a href="<?php echo base_url().'input/input_pekerjaan';?>">Pekerjaan</a></li>
                                <li><a href="<?php echo base_url().'input/input_dok';?>">Dokumen</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="ajax-link" href="<?php echo base_url().'lokasi';?>"><i class="glyphicon glyphicon-list-alt"></i><span> Lokasi Arsip</span></a>
                        </li>
                        <li>
                            <a class="ajax-link" href="<?php echo base_url().'maps';?>"><i class="glyphicon glyphicon-map-marker"></i><span> Maps</span></a>
                        </li>
                        <li class="accordion">
                            <a class="ajax-link" href="#"><i class="glyphicon glyphicon-wrench"></i><span> Pengaturan</span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="<?php echo base_url().'users';?>">Users</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div>
            <div class="box-inner">
                
                <div class="box-header well" data-original-title="">
                    <h2>Pencarian Cepat</h2>
                </div>
                <div class="">
                    <table class="" width="100%">
                        <tr>
                            <td colspan="2"><h5>Kata Kunci</h5></td>
                        </tr>
                        <form method="post" action="<?php echo base_url().'home/search';?>" name="frmsearch">
                        <tr>
                            <td colspan="2"><input type="text" class="form-control" placeholder="Dokumen" name="txtsearch"></td>
                        </tr>
                        <tr>
                            <td><button class="btn btn-primary btn-sm" onclick="this.forms['frmsearch'].submit()"><i class="glyphicon glyphicon-search"></i> Cari</button></td>
                            <td><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">Advanced</button></td>
                        </tr>
                        </form>
                    </table>
                </div>
                
            </div>
            </div>
        </div>
        <!--/span-->
        <!-- left menu ends -->

        <!-- MODAL -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">

            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">×</button>
                        <h3>Pencarian Lanjut</h3>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="#1" class="form-horizontal" role="form">
                            <div class="form-group">
                              <label class="control-label col-sm-4" for="email">Index Arsip:</label>
                              <div class="col-sm-4">
                                <input type="text" class="form-control">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-sm-4" for="pwd">Nama Pekerjaan:</label>
                              <div class="col-sm-6">          
                                <input type="text" class="form-control">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-sm-4" for="pwd">Tahun</label>
                              <div class="col-sm-6">          
                                <input type="text" class="form-control">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-sm-4" for="pwd">Provinsi</label>
                              <div class="col-sm-6">          
                                <input type="text" class="form-control">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-sm-4" for="pwd">Nomor Dokumen</label>
                              <div class="col-sm-8">          
                                <input type="text" class="form-control">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-sm-4" for="pwd">Perihal</label>
                              <div class="col-sm-6">          
                                <input type="text" class="form-control">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-sm-4" for="pwd">Asal Dokumen</label>
                              <div class="col-sm-6">          
                                <input type="text" class="form-control">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-sm-4" for="pwd">Lokasi Dokumen</label>
                              <div class="col-sm-6">          
                                <input type="text" class="form-control">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-sm-4" for="pwd">Gedung</label>
                              <div class="col-sm-6">          
                                <input type="text" class="form-control">
                              </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i> Cari</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
	</body>
</html>