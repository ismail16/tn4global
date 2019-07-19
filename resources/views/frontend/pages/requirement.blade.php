@extends('frontend.layouts.master')

@section('content')
<section class="wn_contact_area bg--white pt-4 pb-4">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-12">
				<div class="contact-form-wrap">
					<h2 class="contact__title">Submit Your Requirements</h2>
					<p>Nam liber tempor cum soluta nobis eleifend option congue </p>
					<form action="{{ route('requirement_submit') }}" method="post">
						@csrf
						<div class="form-row">
							<div class="form-group col-md-12">
								<label for="title">Title</label>
								<input type="text" name="title" class="form-control" id="title" placeholder="Title What are want">
							</div>
						</div>
						<div class="form-group">
							<label for="Description">Description</label>
							<textarea name="description" class="form-control" id="Description" rows="3">
								Description of yor requirements
							</textarea>
						</div>


						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="inputEmail4">Email</label>
								<input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email">
							</div>
							<div class="form-group col-md-6">
								<label for="phone">Phone</label>
								<input type="number" name="phone" class="form-control" id="phone" placeholder="phone number">
							</div>
						</div>


						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="Name">Name</label>
								<input type="text" name="name" class="form-control" id="Name" placeholder="Name">
							</div>
							<div class="form-group col-md-6">
								<label for="Address">Address</label>
								<textarea name="address" class="form-control" id="Address" rows="3">
								</textarea>
							</div>
						</div>

						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="inputCity">City</label>
								<input type="text" class="form-control" id="inputCity">
							</div>
							<div class="form-group col-md-6">
								<label for="inputState">Country</label>
								<select id="inputState" name="country" class="form-control">
									<option selected>Choose...</option>
									<option value="bangladesh">Bangladesh</option>
								</select>
							</div>
						</div>
						<input type="submit" class="btn btn-primary" value="Submit">
					</form>
				</div>
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
