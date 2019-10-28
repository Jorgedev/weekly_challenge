@extends('layouts.app')
@section('content')
<div class="container">
   @include('includes.alerts')
   <div class="row">
      <div class="col-md-12 order-md-1">
         <h4 class="mb-3">Objetivos cadastrados</h4>
         <div class="list-group">
            @foreach($weeks as $week)
            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start" data-toggle="modal" data-target="#editChallenge" data-id="{{$week->id}}" data-week="{{$week->order}}" data-deposited-amount="{{$week->deposited_amount}}" data-deposit-status="{{$week->deposit_status}}">
               <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1">{{$week->order}}ª semana</h5>
                  <small>{{$week->deposit_at}} </small> 
               </div>
               <p class="mb-1">R$ {{$week->deposited_amount}}</p>
               <small>{{$week->deposit_status}}</small> 
            </a>
            @endforeach
         </div>
      </div>
      <div class="modal fade bd-example-modal-lg" id="editChallenge" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
               <form role="form" action="" method="POST">
                  @csrf
                  @method('PUT')
                  <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <div class="form-group">
                        <label>Valor a ser depositado:</label>
                        <input type="text" class="form-control" id="deposited_amount" disabled name="test">
                     </div>
                     <div class="form-group">
                        <label>Situação:</label>
                        <input type="text" class="form-control" id="deposit_status" disabled>
                     </div>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-light" data-dismiss="modal">Fechar</button>
                     <button type="submit" class="btn btn-success" id="change-status">Efetivar o deposito</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection