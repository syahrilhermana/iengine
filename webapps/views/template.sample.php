<!DOCTYPE html>
<html lang="en" >
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $this->template->title->default("TOMAEDU"); ?></title>

    <!--favicon-->
    <link rel="apple-touch-icon" href="assets/theme/images/apple-touch-icon.png">
    <link rel="shortcut icon" href="assets/theme/images/favicon.ico" type="image/x-icon">

    <?php echo  css('bootstrap-3.3.2/css/bootstrap.min.css', 'all', 'Packages'); ?>
    <?php echo  css('font-awesome-4.2.0/css/font-awesome.min.css', 'all', 'Packages'); ?>
    <?php echo  css('datatables/datatables.min.css', 'all', 'Packages'); ?>
    <?php echo  css('jquery.modal.css', 'all', 'Packages'); ?>

    <?php echo  css('theme.css', 'all', 'css'); ?>  
    <?php echo  css('theme-custom.css', 'all', 'css'); ?>  


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <?php echo  js('jquery.js', 'Packages'); ?>
    <?php echo  js('jquery.easing-1.3.pack.js', 'Packages'); ?>
    
    <?php echo  js('tomatech.js', 'js'); ?>
  </head>  
  <body>
    <!-- wrapper page -->
    <div class="wrapper">
      <!-- main-header -->
      <header class="main-header">

        <!-- main navbar -->
        <?php echo $this->template->widget("navigation"); ?>
        <!-- end main navbar -->

        <!-- mobile navbar -->
        <?php echo $this->template->widget("mobile_navigation"); ?>
        <!-- mobile navbar -->

		<!-- partial _block -->
		<?php if(!empty($partial)) echo $partial->content(); ?>
        
      </header><!-- end main-header -->


      <!-- body-content -->
      <div class="body-content clearfix" >
		<?php echo $this->template->content; ?>
      </div><!--end body-content -->


      <!-- main-footer -->
      <footer class="main-footer">


        <div class="container">
          <div class="row">
            <div class="col-sm-6">
              <ul class="list-inline link-footer text-center-xs">
                <li><a href="index.html">Home</a></li>
                <li><a href="blog.html">Blog</a></li>
                <li><a href="about.html">About Us</a></li>
                <li><a href="contact.html">Contact Us</a></li>
              </ul>
            </div>
            <div class="col-sm-6 ">
              <p class="text-center-xs hidden-lg hidden-md hidden-sm">Stay Connect</p>
              <div class="socials text-right text-center-xs">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-youtube-play"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div>
      </footer><!-- end main-footer -->

    </div><!-- end wrapper page -->
    

	<?php echo  js('bootstrap-3.3.2/js/bootstrap.min.js', 'Packages'); ?>
    <?php echo  js('magnific-popup/jquery.magnific-popup.min.js', 'Packages'); ?>
    <?php echo  js('datatables/datatables.min.js', 'Packages'); ?>
    <?php echo  js('jquery.modal.js', 'Packages'); ?>
    <?php echo  js('noty/js/noty/packaged/jquery.noty.packaged.js', 'Packages'); ?>

    <?php echo  js('theme.js', 'js'); ?>    
    
  </body>
</html>