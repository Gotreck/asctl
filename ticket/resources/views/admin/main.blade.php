@extends('layout.master') 

@section('additionalheader')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <script   src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
@endsection



@section('content')

{{-- Parallax header --}}
<section id="section">
    <div class="parallax-container center valign-wrapper border-down">
        <div class="parallax"><img src="/image/info.jpg" alt="background-parallax">
        </div>
        <div class="container white-text">
            <div class="row">
                <div class="col s12">
                    <h3>Page d'administration</h3>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- DataTable with some info --}}
<div class="row datatable">
    <div class="col m12 l10 offset-l1">        
        <table id="tickettable" class='display'>
            <caption>Ticket vendu</caption>
            <thead>
                <tr>
                    <th>Id du ticket</th>
                    <th>Nom de l'acheteur</th>
                    <th>Prénom de l'acheteur</th>
                    <th>Catégory du ticket</th>
                    <th>Validité</th>
                </tr>
            </thead>
            <tbody >
                @foreach ($orders as $order)
                

                @foreach ($order->ticket as $ticket)
                    
                <tr>
                    <td>{{$ticket->id}}</td>
                    <td>{{$order->user()->first_name}}</td>
                    <td>{{$order->user()->last_name}}</td>
                    <td>{{$ticket->category()->name}}</td>
                    <td>{{$order->validate}}</td>
                </tr>
                @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
</div>
       
@endsection












 
@section('scripts')
{{-- Script for filling the table in ajax --}}
<script>
    $(document).ready(function() {
        $('.parallax').parallax();
    
        $('#tickettable').DataTable( {
            "language": {
                "url": "http://cdn.datatables.net/plug-ins/1.10.9/i18n/French.json"
            },
            "dom": 'Bfrtip',
            "buttons": [
                'print'
            ]
            
        });

        
       

    });

</script>
@endsection