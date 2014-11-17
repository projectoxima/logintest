<div id="sidebar" class="sidebar sidebar-fixed">
	<div class="sidebar-menu nav-collapse">
		<div class="divide-20"></div>
		<!-- SEARCH BAR -->
		<div id="search-bar">
			<input class="search" type="text" placeholder="Search"><i class="fa fa-search search-icon"></i>
		</div>
		<!-- /SEARCH BAR -->
		<ul>
			<li class="active sub-menu">
				<a href="<?=base_url();?>" class="parent-menu">
				<i class="fa fa-dashboard fa-fw"></i> <span class="menu-text">Beranda</span>
				<span class="selected"></span>
				</a>					
			</li>
			<li class="has-sub sub-menu">
				<a href="javascript:;" class="parent-menu">
					<i class="fa fa-file fa-fw"></i> <span class="menu-text">Static Content</span>
					<span class="arrow"></span>
				</a>
				<ul class="sub">
					<li><a class="" href="<?php echo base_url();?>#/profile"><span class="sub-menu-text">Profile</span></a></li>
					<li><a class="" href="<?php echo base_url();?>#/sejarah"><span class="sub-menu-text">Sejarah Kesatuan</span></a></li>
					<li><a class="" href="<?php echo base_url();?>#/tugas"><span class="sub-menu-text">Tugas</span></a></li>
					<li><a class="" href="<?php echo base_url();?>#/makna_lambang"><span class="sub-menu-text">Arti dan Makna Lambang</span></a></li>
					<li><a class="" href="<?php echo base_url();?>#/visi_misi"><span class="sub-menu-text">Visi dan Misi</span></a></li>
					<li><a class="" href="<?php echo base_url();?>#/sambutan"><span class="sub-menu-text">Sambutan Danpusdik</span></a></li>
					<li><a class="" href="<?php echo base_url();?>#/organisasi"><span class="sub-menu-text">Organisasi</span></a></li>
					<li><a class="" href="<?php echo base_url();?>#/informasi_pimpinan"><span class="sub-menu-text">Informasi dan Foto Pimpinan</span></a></li>
					<li><a class="" href="<?php echo base_url();?>#/informasi_kontak"><span class="sub-menu-text">Informasi Kontak</span></a></li>
					<li><a class="" href="<?php echo base_url();?>#/link_satuan"><span class="sub-menu-text">Link Satuan</span></a></li>
					<li><a class="" href="<?php echo base_url();?>#/link_kodiklat"><span class="sub-menu-text">Link Kodiklat</span></a></li>
				</ul>
			</li>
			<li class="has-sub sub-menu">
				<a href="javascript:;" class="parent-menu">
					<i class="fa fa-pencil-square-o fa-fw"></i> <span class="menu-text">Dynamic Content</span>
					<span class="arrow"></span>
				</a>
				<ul class="sub">
					<li><a class="" href="<?php echo base_url();?>#/berita"><span class="sub-menu-text">Berita</span></a></li>
					<li><a class="" href="<?php echo base_url();?>#/galery_foto"><span class="sub-menu-text">Galery Foto</span></a></li>
					<li><a class="" href="<?php echo base_url();?>#/galery_video"><span class="sub-menu-text">Galery Video</span></a></li>
				</ul>
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
