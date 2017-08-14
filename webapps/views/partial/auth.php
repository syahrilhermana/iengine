<div class="hero-header">
	<div class="inner-hero-header">
		<div class="container">
			<div class="text-center logo">
				<a href="index.html"> <?php echo img('logo.png', 'img')?> </a>
			</div>
			<div class="relative">
				<i class="fa fa-globe ic-fade-globe"></i>
				<!-- form search -->
				<form class="form-search-home" method="post" action="job_list.html">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Username</label> <input class="form-control  input-lg"
									placeholder="e.g : syahril.hermana">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Password</label> <input type="password"
									class="form-control input-lg" placeholder="********">
							</div>
						</div>
					</div>
					<div class="form-group">
						<button
							class="btn btn-t-primary btn-lg btn-theme btn-pill btn-block">Login</button>
					</div>
					<div class="text-center">
						<a href="#modal-forgot" data-toggle="modal">Lupa Password</a>
					</div>
				</form>
				<!-- end form search -->
			</div>
		</div>
	</div>


	<!-- modal Advanced search -->
	<div class="modal fade" id="modal-forgot">
		<div class="modal-dialog ">
			<div class="modal-content">
				<form>
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"
							aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title" id="myModalLabel">Forgot Password</h4>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label>Email / Username</label> <input type="text"
										class="form-control " name="text">
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default btn-theme"
							data-dismiss="modal">Tutup</button>
						<button type="submit" class="btn btn-success btn-theme">Ok</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- end modal forgot password -->
</div>