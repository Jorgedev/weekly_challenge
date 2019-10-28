@extends('layouts.app')
@section('content')
<div class="container">
   @include('includes.alerts')
   <div class="row">
      <div class="col-md-4 order-md-2 mb-4">
         <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Total de objetivos</span>
            <span class="badge badge-primary badge-pill">{{ $challenges->total() }}</span>
         </h4>
         <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between bg-light">
               <div class="text-success">
                  <h6 class="my-0">Valor já arrecadado</h6>
                  <small>R$ {{$yes}}</small>
               </div>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
               <div>
                  <h6 class="my-0">Lançamentos futuros</h6>
                  <small class="text-muted">R$ {{$no}}</small>
               </div>
            </li>
         </ul>
         <a href="#" class="btn btn-success" data-toggle="modal" data-target=".bd-example-modal-lg">Cadastrar novo objetivo</a>
         <h4 class="d-flex justify-content-between align-items-center mb-3 pt-5">
            <span class="text-muted">Minhas medalhas</span>
            <span class="badge badge-primary badge-pill">{{count($medals)}}</span>
         </h4>

         @forelse ($medals as $medal)
            <div class="card mb-2">
               <div class="row no-gutters">
                  <div class="col-md-12">
                     <div class="card-body">
                        <h6 class="card-title"><i class="fa fa-{{$medal->icon}}"></i> {{$medal->name}}</h6>
                     </div>
                  </div>
               </div>
            </div>
         @empty
             
         @endforelse
      </div>
      <div class="col-md-8 order-md-1">
         <h4 class="mb-3">Objetivos cadastrados</h4>
         <table class="table table-bordered">
            <thead class="thead-light">
               <tr>
                  <th scope="col">Objetivo</th>
                  <th scope="col">Período</th>
                  <th scope="col">Previsão</th>
                  <th scope="col">Ação</th>
               </tr>
            </thead>
            <tbody>
               @php
               $test = 0;
               @endphp
               @forelse ($challenges as $challenge)
               <tr>
                  <td>{{$challenge->name}}</td>
                  <td>{{$challenge->portion}}</td>
                  <td>R${{ $test =+ $challenge->weeks->sum('deposited_amount') }}</td>
                  <td><a href="{{route('challenges.show', $challenge->id)}}" class="btn btn-sm btn-outline-success btn-block"><i class="fas fa-eye"></i></a></td>
               </tr>
               @empty
               <td colspan="4">nenhum objetivo cadastrado</td>
               @endforelse
            </tbody>
         </table>
         {{ $challenges->links() }}
      </div>
   </div>
</div>
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <form role="form" action="{{route('challenges.store')}}" method="POST">
         @csrf
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">Cadastrar novo objetivo</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <div class="form-row">
                  <div class="form-group col-md-6">
                     <label>Nome do objetivo</label>
                     <input type="text" class="form-control" name="name" placeholder="Exemplo: Compra de um novo carro">
                  </div>
                  <div class="form-group col-md-3">
                     <label>Período</label>
                     <select class="form-control" name="portion">
                        <option disabled selected>Selecione</option>
                        <option value="52">52 semanas</option>
                        <option value="104">104 semanas</option>
                     </select>
                  </div>
                  <div class="form-group col-md-3">
                     <label>Valor</label>
                     <div class="input-group mb-3">
                        <div class="input-group-prepend">
                           <span class="input-group-text">R$</span>
                        </div>
                        <input type="text" class="form-control" name="amount">
                        <div class="input-group-append">
                           <span class="input-group-text">.00</span>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <label for="">Descrição do objetivo</label>
                  <textarea class="form-control" name="description"></textarea>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-light" data-dismiss="modal">Fechar</button>
               <button type="submit" class="btn btn-success">Cadastrar novo objetivo</button>
            </div>
         </div>
      </form>
   </div>
</div>
@endsection