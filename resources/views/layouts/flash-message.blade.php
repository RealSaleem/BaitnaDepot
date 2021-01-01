<div class="row">
	<div class="col s12">
    	<div class="container">
			@if($message = Session::get('success'))
			<div class="card-alert card green lighten-5">
			    <div class="card-content green-text">
			        <p>{{ $message }}</p>
			    </div>
			    <button type="button" class="close green-text" data-dismiss="alert" aria-label="Close">
			        <span aria-hidden="true">×</span>
			    </button>
			</div>
			@endif


			@if($message = Session::get('error'))
			<div class="card-alert card red lighten-5">
                <div class="card-content red-text">
                    <p>{{ $message }}</p>
                </div>
                <button type="button" class="close red-text" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
			@endif


			@if($message = Session::get('warning'))
			<div class="card-alert card orange lighten-5">
                <div class="card-content orange-text">
                    <p>{{ $message }}</p>
                </div>
                <button type="button" class="close orange-text" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
			@endif


			@if($message = Session::get('info'))
			<div class="card-alert card cyan lighten-5">
                <div class="card-content cyan-text">
                    <p>{{ $message }}</p>
                </div>
                <button type="button" class="close cyan-text" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
			@endif


			@if ($errors->any())
			<div class="card-alert card red lighten-5">
                <div class="card-content red-text">
                    <p>Please check the form below for errors</p>
                </div>
                <button type="button" class="close red-text" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
			@endif
		</div>
	</div>
</div>