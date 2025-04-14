@extends('admin.layouts.app')
@section('title', 'Scrapper List')
@section('content')
<div class="container-full">
	<div class="content-header">
	    <div class="d-flex align-items-center">
	        <div class="mr-auto">
	            <h3 class="page-title">Scrapper List</h3>
	            <div class="d-inline-block align-items-center">
	                <nav>
	                    <ol class="breadcrumb">
	                        <li class="breadcrumb-item">
	                        	<a href="#"><i class="mdi mdi-home-outline">Scrapper Management</i></a>
	                        </li>
	                        <li class="breadcrumb-item active" aria-current="page">Scrapper List</li>
	                    </ol>
	                </nav>
	            </div>
	        </div>
	    </div>
	</div>
	<section class="content">
		<div class="row">
			<div class="col-lg-12 col-12">
				<div class="box">
					<div class="box-header with-border">
						<h4 class="box-title">Scrapper Details</h4>
					</div>
					@if ($errors->any())
						{{ implode('', $errors->all('<div>:message</div>')) }}
					@endif
					<!-- /.box-header -->
					<form class="form" method="post" action="{{ route('scrapper.store') }}" enctype="multipart/form-data">
						@csrf
						<div class="box-body">
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="">Category</label>
										<select name="category" id="category" class="form-control select2">
											<option value="">Select Category</option>
											@foreach($get_cat as $key => $value)
											<option value="{{ $value->id }}">{!! $value->getParentsNames() !!}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="">Website</label>
										<select name="website" id="website" class="form-control">
											<option value="">Select Website</option>
											<option value="1">Outfitters</option>
											<option value="2">J. Junaid Jamshed</option>
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="">CSV File</label>
										<input type="file" name="file" class="form-control">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="progress">
									<div class="progress-bar progress-bar-striped progress-bar-animated bg-success result" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%" id="progressBar">0%</div>
									
								</div>
							</div>
						</div>
						<div class="box-footer">
							<button type="button" class="btn btn-rounded btn-warning btn-outline mr-1">
								<i class="ti-trash"></i> Cancel
							</button>
							<button type="submit" class="btn btn-rounded btn-primary btn-outline" onclick="progress()"
							>
								<i class="ti-save-alt"></i> Save
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
</div>
@endsection

@push('css')
<style></style>
@endpush

@push('js')
<script></script>
@endpush