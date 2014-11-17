<div id="sidebar" class="sidebar sidebar-fixed">
	<div class="sidebar-menu nav-collapse">
		<div class="divide-20"></div>
		<ul>
			<li class="active sub-menu">
				<a href="<?=base_url();?>" class="parent-menu">
					<i class="fa fa-tachometer fa-fw"></i> <span class="menu-text">Dashboard</span>
					<span class="selected"></span>
				</a>
			</li>
		</ul>
		<!-- /SIDEBAR MENU -->
	</div>
</div>
<script type="text/javascript">
	var handleActiveToggle = function () {
		$('#sidebar')
		$('#list-toggle .list-group a').click(function(){
			$('#list-toggle .list-group > a.active').removeClass('active');
			$(this).addClass('active');
		})
	}
</script>
