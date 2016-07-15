<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Pro-KMS</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<link href="<?= base_url()?>templates/march/css/bootstrap.min.css" rel="stylesheet">
<link href="<?= base_url()?>templates/march/css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="<?= base_url()?>templates/march/css/googlefont/googlefont.css" rel="stylesheet">
<link href="<?= base_url()?>templates/march/css/font-awesome.css" rel="stylesheet">
<link href="<?= base_url()?>templates/march/css/style.css" rel="stylesheet">
<link href="<?= base_url()?>templates/march/css/pages/dashboard.css" rel="stylesheet">
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]--> 
</head>
<body>
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container"> 
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                    class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a>
        <a class="brand" href="index.html">Pro-KMS</a>
    </div>
    <!-- /container --> 
  </div>
  <!-- /navbar-inner --> 
</div>
<!-- /navbar -->

<!--START of dynamic content that supplied from sub view(s)-->
<?= ($content ? $content:'')?>
<!-- END of dynamic content that supplied from sub view(s)-->

<!-- Le javascript
================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<script src="<?= base_url()?>templates/march/js/jquery-1.7.2.min.js"></script> 
<script src="<?= base_url()?>templates/march/js/excanvas.min.js"></script> 
<script src="<?= base_url()?>templates/march/js/chart.min.js" type="text/javascript"></script> 
<script src="<?= base_url()?>templates/march/js/bootstrap.js"></script>
<script language="javascript" type="text/javascript" src="<?= base_url()?>templates/march/js/full-calendar/fullcalendar.min.js"></script>
<script src="<?= base_url()?>templates/march/js/base.js"></script> 
</body>
</html>