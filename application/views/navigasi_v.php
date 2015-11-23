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
                            <a class="ajax-link" href="<?php echo base_url().'lokasi';?>"><i class="glyphicon glyphicon-list-alt"></i><span> Lokasi Dokumen</span></a>
                        </li>
                        <li>
                            <a class="ajax-link" href="<?php echo base_url().'maps';?>"><i class="glyphicon glyphicon-map-marker"></i><span> Maps</span></a>
                        </li>
                        <li class="accordion">
                            <a class="ajax-link" href="#"><i class="glyphicon glyphicon-wrench"></i><span> Pengaturan</span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="<?php echo base_url().'users';?>">Users</a></li>
                                <li><a href="<?php echo base_url().'informasi';?>">Informasi Data</a></li>
                            </ul>
                        </li>
                        <li class="accordion">
                            <a class="ajax-link" href="#"><i class="glyphicon glyphicon-question-sign"></i><span> Help</span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Manual</a></li>
                                <!--<li><a href="<?php echo base_url().'informasi';?>">Informasi Data</a></li>-->
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div>
              <div class="box-inner">
                  <div class="box-header well">
                      <h2>Pencarian Cepat</h2>
                  </div>
                  <div class="box-content">
                    <form role="form" method="post" action="<?php echo base_url().'home/search';?>" name="frmsearch">
                      <div class="form-group">
                          <label for="pencarian">Kata Kunci</label>
                          <input type="text" class="form-control" name="txtsearch" placeholder="Keyword">
                      </div>
                      <button class="btn btn-primary btn-sm" onclick="this.forms['frmsearch'].submit()"><i class="glyphicon glyphicon-search"></i> Cari</button>
                      <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">Advanced</button>
                    </form>                                                
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
                        <form method="post" action="<?php echo base_url().'home/adv_search';?>" class="form-horizontal" role="form">
                            <div class="form-group">
                              <label class="control-label col-sm-4" for="email">Index Arsip:</label>
                              <div class="col-sm-4">
                                <input type="text" class="form-control" name="txtidxarsip">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-sm-4" for="pwd">Nama Pekerjaan:</label>
                              <div class="col-sm-6">          
                                <input type="text" class="form-control" name="txtnmpekerjaan">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-sm-4" for="pwd">Tahun</label>
                              <div class="col-sm-6">          
                                <input type="text" class="form-control" name="txttahun">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-sm-4" for="pwd">Provinsi</label>
                              <div class="col-sm-6">          
                                <input type="text" class="form-control" name="txtprovinsi">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-sm-4" for="pwd">Nomor Dokumen</label>
                              <div class="col-sm-8">          
                                <input type="text" class="form-control" name="txtnodok">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-sm-4" for="pwd">Perihal</label>
                              <div class="col-sm-6">          
                                <input type="text" class="form-control" name="txtperihal">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-sm-4" for="pwd">Asal Dokumen</label>
                              <div class="col-sm-6">          
                                <input type="text" class="form-control" name="txtasaldok">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-sm-4" for="pwd">Lokasi Dokumen</label>
                              <div class="col-sm-6">          
                                <input type="text" class="form-control" name="txtlokasi">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-sm-4" for="pwd">Gedung</label>
                              <div class="col-sm-6">          
                                <input type="text" class="form-control" name="txtgedung">
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