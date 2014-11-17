<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Cipaganti | Aplikasi Pengajuan Anggaran</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
    <meta name="description" content="Cipaganti - Aplikasi Pengajuan Anggaran">
    <meta name="author" content="Aegis">

    <link rel="shortcut icon" type="image/png" href="<?php echo base_url(); ?>img/favicon.ico.png">

    <!-- STYLESHEETS -->
    <!--
      [if lt IE 9]>
        <script src="js/flot/excanvas.min.js"></script>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
      <![endif]
    -->

    <!-- BOOTSTRAP -->
    <link rel="stylesheet" type="text/css"  href="<?php echo base_url(); ?>cloud-admin/bootstrap-dist/css/bootstrap.min.css" />

    <!-- CLOUD ADMIN -->
    <link rel="stylesheet" type="text/css"  href="<?php echo base_url(); ?>cloud-admin/css/cloud-admin.css" />
    <link rel="stylesheet" type="text/css"  href="<?php echo base_url(); ?>cloud-admin/css/responsive.css" />

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>cloud-admin/css/cloud-admin.css" >
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>cloud-admin/font-awesome/css/font-awesome.min.css">

    <!-- UNIFORM -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>cloud-admin/js/uniform/css/uniform.default.min.css" />

    <!-- ANIMATE -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>cloud-admin/css/animatecss/animate.min.css" />

    <!-- FONTS -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>

    <style type="text/css">
    .login-box {
      width: 410px !important;
    }

    body {
      background-image: url('../../img/login/2.jpg');
    }
    </style>
  </head>
  <body>
    <section id="login_bg" class="visible">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-md-offset-4">
            <div class="login-box">
              <h4 class="bigintro"><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>cloud-admin/img/logo/logo-cipaganti.png" height="50px" alt="logo name" /></a></h4>
              <br />
              <h4 style="font-size: 24px;"><center><strong>Form Reset Password</strong></center></h4>
              <div class="divide-40"></div>
              <form id="form_reset_password" role="form" class="form-horizontal">
                <div class="form-group">
                  <label for="password">Password</label>
                  <i class="fa fa-lock"></i>
                  <input type="text" class="form-control" id="password" name="password">
                  <span for="password" class="error-span"><?php echo $this->session->flashdata('message'); ?></span>
                </div>
                <div class="form-group"> 
                  <label for="confirm_password">Confirm Password</label>
                  <i class="fa fa-lock"></i>
                  <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                </div>
                <br>
                <div class="form-group"> 
                  <button id="btn_reset" class="btn btn-danger" type="button">Submit</button>
                </div>
                <input type="hidden" id="id_user" name="id_user" value="<?php echo $data_user['user_id'] ;?>">
              </form>
              <div class="login-helpers">
                <a href="<?php echo base_url() ;?>">Back to Login</a> <br>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- RESET PASSWORD SUCCESS -->
    <div class="modal fade" id="modal-reset-success" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Password Reset</h4>
          </div>
          <div class="modal-body">
            Reset Password Success.
          </div>
          <div class="modal-footer">
            <button data-dismiss="modal" class="btn btn-default" type="button">OK</button>
          </div>
        </div>
      </div>
    </div>
    <!-- /RESET PASSWORD SUCCESS -->

    <!-- JQUERY -->
    <script src="<?php echo base_url();?>cloud-admin/js/jquery/jquery-2.0.3.js"></script>
    
    <!-- JQUERY VALIDATION -->
    <script type="text/javascript" src="<?php echo base_url() ;?>cloud-admin/js/jquery-validate/jquery.validate.js"></script>

    <!-- BOOTSTRAP -->
    <script type="text/javascript" src="<?php echo base_url(); ?>cloud-admin/bootstrap-dist/js/bootstrap.min.js"></script>

    <script type="text/javascript">
      // Reset Password
      $('#btn_reset').click(function(){
        var ValidStatus = $("#form_reset_password").valid();
        if (ValidStatus == false) {
          return false;
        } else {
          $.ajax({
            url: '<?php echo base_url();?>auth/change_password',
            type: 'POST',
            data: $('#form_reset_password').serialize(),
            dataType: 'json'
          })
          .done(function(response, textStatus, jqhr){
            $('#password').val('');
            $('#confirm_password').val('');
            $('#modal-reset-success').modal('show');
          })
          .fail(function(){

          });
        }
      });

      // Form validation for add new kategori
      $('#form_reset_password').validate({
        rules: {
            password: {
              required: true
            },  confirm_password: {
              equalTo: "#password",
              required: true
            }
        },
        highlight: function(element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
        errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function(error, element) {
            if(element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        }
      });
    </script>
  </body>
</html>