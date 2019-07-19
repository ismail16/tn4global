@extends('frontend.layouts.master')

@section('content')
<section class="wn_contact_area bg--white pt-4 pb-4">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-12">
				<div class="contact-form-wrap">
					<h2 class="contact__title">Get in touch</h2>
					<p>Nam liber tempor cum soluta nobis eleifend option congue </p>
					<form id="contact-form" action="{{ route('contract_submit') }}" method="post">
						@csrf
						<div class="single-contact-form space-between">
							<input type="text" name="name" placeholder="Name*">
							<input type="number" name="mobile" placeholder="Mobile">
						</div>
						<div class="single-contact-form space-between">
							<input type="email" name="email" placeholder="Email*">
							<input type="text" name="website" placeholder="Website*">
						</div>
						<div class="single-contact-form">
							<input type="text" name="subject" placeholder="Subject*">
						</div>
						<div class="single-contact-form message">
							<textarea name="message" placeholder="Type your message here.."></textarea>
						</div>
						<div class="contact-btn">
							<input class="btn-primary" type="submit" value="Submit">
{{--							<button type="submit">Submit</button>--}}
						</div>
					</form>
				</div>
{{--				<div class="form-output">--}}
{{--					<p class="form-messege">--}}
{{--					</div>--}}
				</div>
				<div class="col-lg-4 col-12 md-mt-40 sm-mt-40">
					<div class="wn__address">
						<h2 class="contact__title">Get office info.</h2>
						<div class="wn__addres__wreapper">

							<div class="single__address">
								<i class="icon-location-pin icons"></i>
								<div class="content">
									<span>address:</span>
									<p>28/1/C Toyenbee Circular Road. Motijheel, Dhaka, Bangladesh
									</p>
								</div>
							</div>

							<div class="single__address">
								<i class="icon-phone icons"></i>
								<div class="content">
									<span>Phone Number:</span>
									<p>+8801983-783387</p>
								</div>
							</div>

							<div class="single__address">
								<i class="icon-envelope icons"></i>
								<div class="content">
									<span>Email address:</span>
									<p>tn4globalbd@gmail.comt</p>
								</div>
							</div>

							<div class="single__address">
								<i class="icon-globe icons"></i>
								<div class="content">
									<span>website address:</span>
									<p>www.tn4global.com</p>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Contact Area -->


	@endsection
