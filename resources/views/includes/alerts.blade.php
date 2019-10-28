@if ($errors->any())
   <div class="row">
      <div class="col-md-12">
         <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <strong>Alerta!</strong>
            <ul>
               @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
               @endforeach
            </ul>
         </div>
      </div>
   </div>
@endif

@if (session('success'))
   <div class="row">
      <div class="col-md-12">
         <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <strong>Successo!</strong>
            {{ session('success') }}
         </div>
      </div>
   </div>
@endif

@if (session('error'))
   <div class="row">
      <div class="col-md-12">
         <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <strong>Alerta!</strong>
            {{ session('error') }}
         </div>
      </div>
   </div>
@endif