@extends('layouts.app')

@section('js')
	<script type="text/javascript" src="{{ mix('/js/dashboard.js') }}"></script>
@endsection

@section('content')
	<div class="container text-center p-3">
		<div class="row justify-content-around mt-5">
			<div class="col-7">
				<div class="card">
					<div class="card-header">
						<h2>Calculator</h2>
					</div>
					<div class="card-body">
	
					</div>
				</div>
			</div>
			<div class="col-4">
				<div class="card">
					<div class="card-header">
						<div class="row justify-content-between">
							<div class="col-8">
								<h2>My Cards</h2>
							</div>
							<div class="col-4">
								<button class="btn btn-dark" id="add-card">
									New Card
								</button>
							</div>
						</div>
					</div>
					<div class="card-body">
						
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
					<form>
						@csrf
						<div class="row">
							<div class="col-6">
								<label for="nickname">Card Nickname</label>
								<input type="text" name="nickname" class="form-control" id="nickname">
							</div>
							<div class="col-6">
								<label for="bank">Bank Name</label>
								<input class="form-control" type="text" name="bank" id="bank">
							</div>
						</div>
						<hr>
						<div class="d-flex mt-3 justify-content-between">
							<label class="fs-4">Rewards</label>
							<div class="col-6">
								<div class="btn-group" role="group">
									<button class="btn btn-dark">+</button>
									<button class="btn btn-dark">-</button>
								</div>
							</div>
						</div>
						<hr>
						<div class="row justify-content-end">
							<div class="col-8 text-end">
								<div class="row justify-content-end">
									<div class="col-3 d-grid px-1">
										<button class="btn btn-primary" id="save-card">Save</button>
									</div>
									<div class="col-2 d-grid ps-1 me-2">
										<button class="btn btn-dark" data-bs-dismiss="modal">Cancel</button>
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