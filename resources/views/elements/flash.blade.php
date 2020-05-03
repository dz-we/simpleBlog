

@if($errors->any())
<div class="alert alert-danger alert-dismissible " role="alert">
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>  
@endif

@if(session('success'))
  <div class="alert alert-success alert-dismissible" role="alert">
    <strong>{{ session('success') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>

  </div>
@endif

@if(session('error'))
  <div class="alert alert-danger alert-dismissible" role="alert">
    <strong>{{ session('error') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
  </div>

@endif
