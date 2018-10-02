@extends('pages.layout.index')
@section('title')
	{{"Trang chủ"}}
@endsection
@section('extends')
	@include('pages.layout.slide')
@endsection
@section('content')
<section id="about">
	<div class="container">
		<div class="row">

			<div class="col-md-6 col-sm-12">
				<div class="about-info">
					<h2>Start your journey to a better life with online practical courses</h2>

					<figure>
						<span><i class="fa fa-users"></i></span>
						<figcaption>
							<h3>Professional Trainers</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint ipsa voluptatibus.</p>
						</figcaption>
					</figure>

					<figure>
						<span><i class="fa fa-certificate"></i></span>
						<figcaption>
							<h3>International Certifications</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint ipsa voluptatibus.</p>
						</figcaption>
					</figure>

					<figure>
						<span><i class="fa fa-bar-chart-o"></i></span>
						<figcaption>
							<h3>Free for 3 months</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint ipsa voluptatibus.</p>
						</figcaption>
					</figure>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- CONTACT -->
<section id="contact">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-sm-12">
				<div class="contact-image">
					<img src="pages/images/home/contact.jpg" class="img-responsive" alt="Smiling Two Girls">
				</div>
			</div>

			<div class="col-md-6 col-sm-12">
				<form id="contact-form" role="form" action="" method="post">
					<div class="section-title">
						<h2>Liên hệ với chúng tôi <small>we love conversations. let us talk!</small></h2>
					</div>

					<div class="col-md-12 col-sm-12">
						<input type="text" class="form-control" placeholder="Enter full name" name="name" required="">

						<input type="email" class="form-control" placeholder="Enter email address" name="email" required="">

						<textarea class="form-control" rows="6" placeholder="Tell us about your message" name="message" required=""></textarea>
					</div>

					<div class="col-md-4 col-sm-12">
						<input type="submit" class="form-control" name="send message" value="Send Message">
					</div>

				</form>
			</div>
		</div>
	</div>
</section>       	
@endsection