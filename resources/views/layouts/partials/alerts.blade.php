@if($errors->any())
    <div class="alert alert-danger p-1">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session('success') }}</strong>
        <button type="button" class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
    </div>
@elseif(session('errorLink'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{!! session('errorLink') !!}</strong>
    <button type="button" class="close" data-dismiss="alert">
        <span>&times;</span>
    </button>
  </div>
@elseif(session('info'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session('info') }}</strong>
        <button type="button" class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
      </div>
@endif


