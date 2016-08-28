<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('head')?>
<body>
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container"> 
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                    class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a>
        <a class="brand" href="index.html">Pro-KMS</a>
      <div class="nav-collapse">
        <ul class="nav pull-right">
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon-user"></i> <?= $this->session->userdata('nama')?> <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <?php
              switch ($this->session->userdata('id_role')) {
                    case '4': //petugas yandu
                        $ep_link = base_url().'setting/petugas_new/'.$this->session->userdata('id_user_detail');
                        break;
                    case '3'://dokter
                        $ep_link = base_url().'setting/dokter_new/'.$this->session->userdata('id_user_detail');
                        break;
                    case '2'://orang tua
                        $ep_link = base_url().'setting/ortu_new/'.$this->session->userdata('id_user_detail');
                        break;
                    default :
                        $ep_link = '#';
                        break;
              }
              ?>
              <li><a href="<?= $ep_link?>">Edit Profile</a></li>
              <li><a href="<?= base_url().'auth/logout'?>">Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <!--/.nav-collapse --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /navbar-inner --> 
</div>
<!-- /navbar -->
<?php
//if ($mainmenu != 'hidden')
//{
?>
<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
    <?= kmenu(base_url())?>  
    </div>
     <!--/container-->  
  </div>
   <!--/subnavbar-inner-->  
</div>
<!-- /subnavbar -->
<?php // }?>
<div class="main">
  <div class="main-inner">
      <div class="container" style="min-height: 500px;">
        <!--START of dynamic content that supplied from sub view(s)-->
      <?= ($content ? $content:'')?>
      <!-- END of dynamic content that supplied from sub view(s)-->
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>
<!-- /main -->

<script>     
        $(document).ready(function() {
            return true;
      });
    </script><!-- /Calendar -->
</body>
</html>