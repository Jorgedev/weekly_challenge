@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row">
      <div class="col-md-4 order-md-2 mb-4">
         <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Total de objetivos</span>
            <span class="badge badge-secondary badge-pill">{{count($challenges)}}</span>
         </h4>
         <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between bg-light">
               <div class="text-success">
                  <h6 class="my-0">Valor já arrecadado</h6>
                  <small>EXAMPLECODE</small>
               </div>
               <span class="text-success">-$5</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
               <div>
                  <h6 class="my-0">Lançamentos futuros</h6>
                  <small class="text-muted">Brief description</small>
               </div>
               <span class="text-muted">$12</span>
            </li>
         </ul>
         <a href="" class="btn btn-outline-success btn-block" data-toggle="modal" data-target=".bd-example-modal-lg">Cadastrar novo objetivo</a>
      </div>
      <div class="col-md-8 order-md-1">
         <h4 class="mb-3">Objetivos cadastrados</h4>
         <table class="table table-hover">
            <thead>
               <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Objetivo</th>
                  <th scope="col">Período</th>
                  <th scope="col">Andamento</th>
                  <th scope="col">Ação</th>
               </tr>
            </thead>
            <tbody>
               @forelse ($challenges as $challenge)
                  <tr>
                     <td>{{$challenge->id}}</td>
                     <td>{{$challenge->name}}</td>
                     <td>{{$challenge->weeks}}</td>
                     <td>{{$challenge->amount}}</td>
                     <td><a href="" class="btn btn-outline-success"><i class="fas fa-eye"></i>Visualizar</a></td>
                  </tr>
               @empty
                   
               @endforelse
            </tbody>
         </table>
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
                     <select class="form-control" name="weeks">
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
               <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Fechar</button>
               <button type="submit" class="btn btn-outline-success">Cadastrar novo objetivo</button>
            </div>
         </div>
      </form>
   </div>
</div>
@endsection