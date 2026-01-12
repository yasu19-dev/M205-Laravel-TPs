@extends('layouts.default')

@section('content')

<div class="row">
   <x-stat-card title="Utilisateurs" value="1200" icon="people" />
   <x-stat-card title="Commandes" value="350" icon="cart" />
   <x-stat-card title="Revenus" value="25 000 €" icon="currency-euro" />
</div>

<x-data-table>
   <x-slot name="head">
      <tr>
         <th>Nom</th>
         <th>Email</th>
         <th>Statut</th>
         <th>Action</th>
      </tr>
   </x-slot>

   <x-slot name="body">
      <tr>
         <td>Admin</td>
         <td>admin@test.com</td>
         <td><x-status-badge status="active">Actif</x-status-badge></td>
         <td>
            <x-action-button type="danger" class="btn-sm">Supprimer</x-action-button>
         </td>
      </tr>
   </x-slot>
</x-data-table>

@endsection

