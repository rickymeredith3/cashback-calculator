@extends('layouts.app')

@section('js')
	<script type="text/javascript" src="{{ mix('/js/dashboard.js') }}"></script>
@endsection

@section('content')
	<div class="container p-3" id="container">
		<div class="row justify-content-around mt-5">
			<div class="col-7">
				<div class="card" id="calculator">
					<div class="card-header text-start">
						<h2>Calculator</h2>
					</div>
					<div class="card-body">
						<form>
							@csrf
							<div class="row justify-content-center">

								<div class="col-8">
									<label for="calc-category" class="col-form-label">Purchase Category</label>
									<select name="calc-category" id="calc-category" class="form-select">
										@foreach ($categories as $category)
											<option value="{{$category}}">{{ucwords($category)}}</option>
										@endforeach
									</select>
								</div>
								<div class="row justify-content-center pt-4">
									<div class="col-4 text-center">
										<a href="#" class="btn btn-primary" id="calculate">Calculate</a>
									</div>
								</div>
							</div>
						</form>					
						<div class="row mt-4" id="results" style="display: none;">
							<hr>
							<h5 class="card-title mb-4">For this purchase, you should use:</h5>
							<p class="card-text text-center"><span class="fs-3" id="result-card"></span>to get<span class="fs-3" id="result-reward"></span>rewards.</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-4">
				<div class="card" id="cards">
					<div class="card-header text-start">
						<div class="row justify-content-between">
							<div class="col-8">
								<h2>My Cards</h2>
							</div>
							<div class="col-4">
								<button class="btn btn-primary" id="add-card">
									New Card
								</button>
							</div>
						</div>
					</div>
					<div class="card-body">
						@foreach ($cards as $card)
							<div class="card my-2">
								<div class="card-header">
									<div class="row justify-content-around">
										<div class="col-10">
											<h5>{{$card->nickname}}<span class="fw-light"> - {{$card->bank}}</span></h5>
										</div>
										<div class="col-2">
											<a href="#" class="edit-card" data-card-id="{{ $card->id }}"><img src="/storage/edit.svg" alt="edit button"></a>
										</div>
									</div>
								</div>
								<div class="card-body">
									@foreach($card->rewards as $reward)
										<p class="card-text mb-2">{{$reward->reward}}%  -  {{ucwords($reward->category)}}</p>
									@endforeach
								</div>
							</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="add-card-popup" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<div class="modal-title fs-3">Add Card</div>
				</div>
				<div class="modal-body">
					<form id="card-form">
						@csrf
						<input type="hidden" id="card-id" name="card-id" value="0" />
						<div class="row">
							<div class="col-6">
								<label for="nickname" class="col-form-label">Card Nickname</label>
								<input type="text" name="nickname" class="form-control" id="nickname">
							</div>
							<div class="col-6">
								<label class="col-form-label" for="bank">Bank Name</label>
								<input class="form-control" type="text" name="bank" id="bank">
							</div>
						</div>
						<div class="rewards-section">
							<hr>
							<div class="container px-0" id="rewards-container">
								<div class="row">
									<div class="col-8">
										<label class="col-form-label" for="category[]">Category</label>
										<select name="category[]" id="category[]" class="form-select">
											<option value="fitness">Fitness</option>
											<option value="gas">Gas</option>
											<option value="groceries">Groceries</option>
											<option value="online purchases">Online Purchases</option>
											<option value="restaurants">Restaurants</option>
											<option value="streaming services">Streaming Services</option>
											<option value="travel">Travel</option>
											<option value="Other">Other</option>
										</select>
									</div>
									<div class="col-3">
										<label class="col-form-label" for="rewards">Cashback</label>
										<select class="form-select" name="rewards[]" id="rewards[]">
											<option value="1">1%</option>
											<option value="2">2%</option>
											<option value="3">3%</option>
											<option value="4">4%</option>
											<option value="5">5%</option>
										</select>
									</div>
								</div>
							</div>
							<div class="d-flex justify-content-around mt-3" id="rewards-buttons">							
								<div class="col-8"></div>
								<div class="col-3 d-flex justify-content-end pe-2">
									<div class="btn-group" role="group">
										<a href="#" class="btn btn-primary rewards-button" id="add-reward">+</a>
										<a href="#" class="btn btn-primary rewards-button" id="remove-reward">-</a>
									</div>
								</div>
								
							</div>
						</div>
						<hr>
						<div class="row justify-content-end">
							<div class="col-8 text-end">
								<div class="row justify-content-end">
									<div class="col-3 d-grid px-1">
										<a href="#" class="btn btn-primary" id="save-card">Save</a>
									</div>
									<div class="col-2 d-grid ps-1 me-2">
										<button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection