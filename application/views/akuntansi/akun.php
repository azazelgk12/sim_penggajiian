<?php $CI =& get_instance(); ?>
<style>

</style>
<link href="<?= site_url();?>assets/DataTables/datatables.css" rel="stylesheet">
<script src="<?= site_url();?>assets/DataTables/datatables.min.js"></script>
<script>
    function hapus(id){
      var hps = confirm('apakah anda yakin akan menghapus data akun ini?');
      if(hps == true){
        var setuju = confirm('Apakah anda setuju ?');
        if(setuju == true){
          window.location="<?= site_url('akuntansi/hapus_akun/'); ?>"+id;
        }
        else{
          return false;
        }
      }
      else{
        return false;
      }
    }

    $(document).ready(function(){
       $("#table-akun").DataTable({
           'processing':true,
           'serverSide':true,
           'order':[[1,'asc']],
           'ajax':{
               'url':"<?= site_url('akuntansi/get_data_akun');?>",
               'type':'POST',
               'dataType':'json',

           },

           'columnDefs':[{
               'targets':[0,3],
               'orderable':false,
           },{
               'targets':[0,3],
               'className':'text-center',
           }]
       });

    });
</script>

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
            <h3><?= $title_page; ?> </h3>
            </div>



        </div>

        <div class="clearfix"></div>

        <!-- informasi berhasil atau gagal hapus data KDD -->
        <?php

            if($CI->session->flashdata('status_hapus_akun')== 'berhasil')
                {
        ?>
                    <div class="alert alert-success alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                        <strong>Sukses!</strong> Data Akun berhasil dihapus.
                    </div>
        <?php
                }
            else if($CI->session->flashdata('status_hapus_akun')== "gagal")
                {
        ?>
                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                        <strong>Maaf!</strong> Data Akun gagal dihapus.
                    </div>
        <?php
                }

        ?>
        <!-- / informasi sukses atau gagal hapus data KDD  -->


        <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                <h2 class="col-md-6">Daftar AKUN CV [S] STUDIO <small></small></h2>
                <div class="col-md-6">
                  <a href="<?= site_url('akuntansi/tambah_akun'); ?>" class="btn btn-primary pull-right"><span class="fa fa-plus" style="color:white"></span> Tambah</a>
                </div>
                <div class="clearfix"></div>
                </div>
                <div class="x_content col-md-12">
                  <br />
                  <br />
                  <!-- Datatable data KDD -->
                  <table id="table-akun" class="table table-striped table-bordered ">
                    <thead>
                      <tr class="bg-primary">
                        <th class="col-md-1 text-center">No</th>
                        <th class="col-md-3 text-center">Nama AKun</th>
                        <th class="col-md-3 text-center">Keterangan</th>
                        <th class="col-md-2 text-center">aksi</th>
                      </tr>
                    </thead>


                    <tbody>
                    </tbody>
                  </table>
                  <!-- / Datatable data KDD -->
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
