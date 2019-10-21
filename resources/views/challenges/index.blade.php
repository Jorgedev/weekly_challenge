@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row">
     <div class="col-md-12 order-md-1">
         <h4 class="mb-3">Objetivos cadastrados</h4>


<div class="list-group"> 
@foreach($weeks as $week)
<a href="" class="list-group-item list-group-item-action flex-column align-items-start"> <div class="d-flex w-100 justify-content-between"> <h5 class="mb-1">{{$week->order}}ª semana</h5> <small>{{$week->deposit_at}} </small> </div> <p class="mb-1">R$ {{$week->deposited_amount}}</p> <small>{{$week->deposit_status}}</small> </a>
@endforeach
   </div>
       
      </div>
   </div>
</div>

@endsection
