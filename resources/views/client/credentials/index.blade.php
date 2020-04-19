@extends('client.layouts.app')
@section('title', 'Credentials')
@section('content')
	<div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary"></h6>
        </div>
        <div class="card-body">
        	<div class="row">
        		<div class="col-lg-10">
		                <label for="token" class='text-primary font-weight-bold'>Token</label>
		         		<input class="form-control" readonly type="text" value="{{ session('token') }}" id="token">
        		</div>
        	

        		<div class="col-lg-2 mt-auto text-center">
        			<button id='btnCopyToken' title="Copy" class='btn btn-info'><i class='fa fa-copy' area-hidden="true"></i></button>	
        			<button id='btnRefreshToken' title="Regenerate token" class='btn btn-primary'><i class="fas fa-sync"></i></button>
        		</div>
        	</div>
        </div>
     </div>
 @push('scripts')
 <script>
 	
 	document.querySelector('#btnCopyToken').addEventListener('click', () => {
 		let tokenInputField = document.querySelector('#token');
 		  tokenInputField.select();
		  tokenInputField.setSelectionRange(0, 99999)
		  document.execCommand("copy");
		  alert('Copied');
 	});

 	document.querySelector('#btnRefreshToken').addEventListener('click', () => {
 		
 		$.ajax({
		  url : "{{ route('client.token.regenerate') }}",
		  success : (response) => {
		  	document.querySelector('#token').value = response.token;
		  	alert('Successfully generate new token');
		  }
		});
 	});
 </script>
 @endpush
@endsection

