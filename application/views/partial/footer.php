	<!-- BEGIN JAVASCRIPTS -->
	
	<!-- JQUERY -->
	<script src="<?php echo base_url();?>cloud-admin/js/jquery/jquery-2.0.3.js"></script>
	
	<!-- JQUERY UI-->
	<script src="<?php echo base_url();?>cloud-admin/js/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min.js"></script>
	
	<!-- BOOTSTRAP -->
	<script src="<?php echo base_url();?>cloud-admin/bootstrap-dist/js/bootstrap.min.js"></script>
	
	<!-- COOKIE -->
	<script type="text/javascript" src="<?php echo base_url();?>cloud-admin/js/jQuery-Cookie/jquery.cookie.min.js"></script>

	<!-- CUSTOM SCRIPT -->
	<script src="<?php echo base_url();?>cloud-admin/js/script.js"></script>
	<script>
		jQuery(document).ready(function() {
			App.setPage("index");  //Set current page
			App.init(); //Initialise plugins and elements
		});
	</script>
	
	<!-- router -->
  <script type="text/javascript" src="<?php echo base_url(); ?>js/director.min.js"></script>

	<!--routing script-->
	<script type="text/javascript">

	var image_load = "<div class='row'><div class='col-md-6 pull-right'><div class='ajax_loading'><img src='<?php echo base_url();?>img/loaders/12.gif'/></div></div></div>";

	var image_big = "<div class='row'><div class='col-md-6 pull-right'><div class='ajax_loading'><img src='<?php echo base_url();?>img/loaders/page-loader.gif'/></div></div></div>";

	$(document).ready(function(){
		
		$('.page-title,.breadcrumb').show();
		$('.page-title').html('<h3 class="content-title pull-left">Dashboard</h3>');
		
		if(window.location.hash == "" || window.location.hash == "#/") {
			window.location = '<?php echo base_url() . $dashboard_url;?>';
		} else if(window.location.hash.length > 0) {
			window.location = '<?php echo base_url();?>#/' + location.hash;
		}

		/**
		if(window.location.hash == "" || window.location.hash == "#/")
		{
			window.location = '<?php echo base_url();?>#/<?=($this->session->userdata("getting_started") == 1)? "getting_started" : "home/panel";?> ';
		}
		else if(location.hash != "/getting_started")
		{
			window.location = '<?php echo base_url();?>#/'+location.hash;
		}
		**/

		var routes = {
			  '/dashboard' : mainDashboard
		}
		
		var router = Router(routes);
		router.init();
	});
	
	 $('.child-menu').click(function(ev){
        //remove all parent current active
        $('.sub-menu').removeClass('active');
        //add parent current active
        $(this).parent().parent().parent().addClass('active');

        //remove all current active
        $('.child-menu').parent().removeClass('active');
        //add current active
        $(this).parent().addClass('active');

        modifyBreadcrumb(this, 1);
      });

      $('.parent-menu').click(function(){
        //remove all parent current active
        $('.sub-menu').removeClass('active');
        //remove all current active
        $('.child-menu').parent().removeClass('active');

        //add parent current active
        $(this).parent().addClass('active');  

        modifyBreadcrumb($(this).children('span'), 2);
      });

      function initView(idToShow, docTitle){
	    $('.page-content').hide();
	    $('.page-content').empty();
	    $('#' + idToShow).show();
	    document.title = docTitle;
	  }

      function modifyBreadcrumb(el,type){
        $('.page-title').show();
        $('.breadcrumb').show();
        $('.page-title').html('<h3 class="content-title pull-left">'+$(el).html()+'</h3>');

        var bc =  '<li>' + '<i class="fa fa-home"></i> <a href="<?=base_url();?>">Home</a>' + '</li>';
        if(type == 1){
          bc += '<li>' +''+ $(el).parent().parent().siblings('a').children('span').html() + '</li>';
          bc += '<li>' + $(el).html() + '</li>';
        } else {
          bc += '<li>' +  $(el).html() + '</li>';
        }
        $('.breadcrumb').html(bc);
      }
	  	  
		function mainDashboard(){
			$.ajax({
			  url: '<?php echo base_url();?>dashboard',
			  beforeSend: function(){ $('.page-content').html(image_load); }
			})
			.done(function(response, textStatus, jqhr){
			  initView('main-dashboard','Customer Management Apps | Dashboard');
			  $('#main-dashboard').html(response);
			}) 
			.fail(function(){

			});
	  }
	</script>
   <!-- END JAVASCRIPTS -->   
</html>