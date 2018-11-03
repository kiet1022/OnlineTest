<div class="col-md-3">
				<div class="profile-sidebar">
					<!-- SIDEBAR USERPIC -->
					<div class="profile-userpic">
						<img src="images/admin.jpg" class="img-responsive" alt="">
					</div>
					<!-- END SIDEBAR USERPIC -->
					<!-- SIDEBAR USER TITLE -->
					<div class="profile-usertitle">
						<div class="profile-usertitle-name">
							{{$userinfo->name}}
						</div>
						<div class="profile-usertitle-job">
							{{changeRole($user->level)}}
						</div>
					</div>
					<!-- END SIDEBAR USER TITLE -->
					<!-- SIDEBAR BUTTONS -->
					<div class="profile-userbuttons">
						<button type="button" class="btn btn-success btn-sm">Follow</button>
						<button type="button" class="btn btn-danger btn-sm">Message</button>
					</div>
					<!-- END SIDEBAR BUTTONS -->
					<!-- SIDEBAR MENU -->
					<div class="profile-usermenu">
						<ul class="nav">
							<li class="active">
								<a href="#">
									<i class="glyphicon glyphicon-home"></i>
								Thông tin chung </a>
							</li>
							<li>
								<a href="#">
									<i class="glyphicon glyphicon-user"></i>
								Cài đặt tài khoản </a>
							</li>
							<li>
								<a href="#" target="_blank">
									<i class="glyphicon glyphicon-ok"></i>
								Bài thi </a>
							</li>
							<li>
								<a href="#">
									<i class="glyphicon glyphicon-flag"></i>
								Help </a>
							</li>
						</ul>
					</div>
					<!-- END MENU -->
				</div>
			</div>