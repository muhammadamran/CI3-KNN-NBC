<!--**********************************Main wrapper start***********************************-->
<div id="main-wrapper">
	<!--**********************************Nav header start***********************************-->
	<div class="nav-header">
		<div class="brand-logo">
			<a href="#!">
				<b class="logo-abbr"><img src="<?= base_url('assets/images/apps/logo-sidebar/' . $this->session->userdata('logo_sidebar_one')); ?>" class="icon-header" alt=""> </b>
				<span class="logo-compact"><img src="<?= base_url('assets/images/apps/logo-sidebar/' . $this->session->userdata('logo_sidebar')); ?>" alt=""></span>
				<span class="brand-title">
					<img src="<?= base_url('assets/images/apps/logo-sidebar/' . $this->session->userdata('logo_sidebar')); ?>" class="logo-header" alt="">
				</span>
			</a>
		</div>
	</div>
	<!--**********************************Nav header end***********************************-->
	<!--**********************************Header start***********************************-->
	<div class="header">
		<div class="header-content clearfix">
			<div class="nav-control">
				<div class="hamburger">
					<span class="toggle-icon"><i class="icon-menu"></i></span>
				</div>
			</div>
			<div class="header-left">
				<div class="input-group icons">
					<div class="input-group-prepend">
						<span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><i class="mdi mdi-magnify"></i></span>
					</div>
					<input type="search" class="form-control" placeholder="Cari Data" aria-label="Cari Data">
					<div class="drop-down animated flipInX d-md-none">
						<form action="#">
							<input type="text" class="form-control" placeholder="Search">
						</form>
					</div>
				</div>
			</div>
			<div class="header-right">
				<ul class="clearfix">
					<li class="icons dropdown">
						<a href="javascript:void(0)" data-toggle="dropdown">
							<i class="mdi mdi-bell-outline"></i>
							<span class="badge badge-pill gradient-3">0</span>
						</a>
						<div class="drop-down animated fadeIn dropdown-menu dropdown-notfication">
							<div class="dropdown-content-heading d-flex justify-content-between">
								<span class="">2 New Notifications</span>
								<a href="javascript:void()" class="d-inline-block">
									<span class="badge badge-pill gradient-2">5</span>
								</a>
							</div>
							<div class="dropdown-content-body">
								<ul>
									<li>
										<a href="javascript:void()">
											<span class="mr-3 avatar-icon bg-success-lighten-2"><i class="icon-present"></i></span>
											<div class="notification-content">
												<h6 class="notification-heading">Events near you</h6>
												<span class="notification-text">Within next 5 days</span>
											</div>
										</a>
									</li>
									<li>
										<a href="javascript:void()">
											<span class="mr-3 avatar-icon bg-danger-lighten-2"><i class="icon-present"></i></span>
											<div class="notification-content">
												<h6 class="notification-heading">Event Started</h6>
												<span class="notification-text">One hour ago</span>
											</div>
										</a>
									</li>
									<li>
										<a href="javascript:void()">
											<span class="mr-3 avatar-icon bg-success-lighten-2"><i class="icon-present"></i></span>
											<div class="notification-content">
												<h6 class="notification-heading">Event Ended Successfully</h6>
												<span class="notification-text">One hour ago</span>
											</div>
										</a>
									</li>
									<li>
										<a href="javascript:void()">
											<span class="mr-3 avatar-icon bg-danger-lighten-2"><i class="icon-present"></i></span>
											<div class="notification-content">
												<h6 class="notification-heading">Events to Join</h6>
												<span class="notification-text">After two days</span>
											</div>
										</a>
									</li>
								</ul>

							</div>
						</div>
					</li>
					<li class="icons dropdown d-none d-md-flex">
						<a href="javascript:void(0)" class="log-user" data-toggle="dropdown">
							<span> Hak Akses: <?= $this->session->userdata('Role'); ?></span>
						</a>
					</li>
					<li class="icons dropdown">
						<div class="user-img c-pointer position-relative" data-toggle="dropdown">
							<span class="activity active"></span>
							<!-- Foto -->
							<?php
							$cek_gender = $this->session->userdata('JenisKelamin');
							$cek_foto = $this->session->userdata('Foto');
							?>
							<?php if ($cek_gender == NULL) { ?>
								<?php if ($cek_foto == NULL) { ?>
									<img src="https://ia601009.us.archive.org/13/items/HeaderIconUser/Header-Icon-User.png" height="40" width="40" alt="">
								<?php } else { ?>
									<img src="<?= base_url('assets/images/user/' . $this->session->userdata('Foto')); ?>" height="40" width="40" alt="">
								<?php } ?>
							<?php } else if ($cek_gender == '1') { ?>
								<!-- PRIA -->
								<?php if ($cek_foto == NULL) { ?>
									<img src="https://assets.webiconspng.com/uploads/2016/11/avatar_business_costume_male_man_office_work_icon_628289.png" height="40" width="40" alt="">
								<?php } else { ?>
									<img src="<?= base_url('assets/images/user/' . $this->session->userdata('Foto')); ?>" height="40" width="40" alt="">
								<?php } ?>
							<?php } else if ($cek_gender == '2') { ?>
								<!-- WNITA -->
								<?php if ($cek_foto == NULL) { ?>
									<img src="https://cdn1.iconfinder.com/data/icons/user-pictures/100/female1-512.png" height="40" width="40" alt="">
								<?php } else { ?>
									<img src="<?= base_url('assets/images/user/' . $this->session->userdata('Foto')); ?>" height="40" width="40" alt="">
								<?php } ?>
							<?php } ?>
							<!-- End Foto -->
						</div>
						<div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
							<div class="dropdown-content-body">
								<ul>
									<li>
										<a href="<?= base_url('profile'); ?>"><i class="icon-user"></i> <span>Profile</span></a>
									</li>
									<hr class="my-2">
									<li>
										<a href="<?= base_url('SignIn/SignOut/' . $this->session->userdata('username')); ?>">
											<i class="icon-key"></i>
											<span>Sign Out</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<!--**********************************Header end ti-comment-alt***********************************-->