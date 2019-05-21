@extends('layout.master') 

@section('additionalheader')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <script   src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>

<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>






@endsection



@section('content')

{{-- Parallax header --}}
<div id="title-guest" class="row ">
        <div class="col l6 offset-l3"><h2 id="title">{{__("Admin")}}</h2></div>
    </div>

{{-- DataTable with some info --}}
<div class="container">
    <div class="row">
        <div class="col l6 m6 s6">
            <a href="/ticket/create">Create ticket</a>
        </div>
        <div class="col l6 m6 s6 right-align">
            <a href="/event/create">Create Event</a>
        </div>
    </div>
</div>
<div class="row datatable">
    <div class="col m12 l10 offset-l1">        
        <table id="tickettable" class='display'>
            <caption>Ticket vendu</caption>
            <thead>
                <tr>
                    <th>Id du ticket</th>
                    <th>Acheté</th>
                    <th>Id de la commande</th>
                    <th>Nom de l'acheteur</th>
                    <th>Prénom de l'acheteur</th>
                    <th>Catégory du ticket</th>
                    <th>Utilisé</th>
                    <th>Valider</th>

                </tr>
            </thead>
            <tbody >
                @foreach ($orders as $order)
                

                @foreach ($order->tickets as $ticket)
                    {{-- TODO : https://datatables.net/examples/api/form.html --}}
                <tr>
                    <td>{{$ticket->id}}</td>
                    <td style="background-color: 
                    @if ($order->validate)
                        green">oui</td>
                    @else
                        red">non</td>
                    @endif  
                    <td>{{$order->id}}</td> 
                    <td>{{$order->user()->first_name}}</td>
                    <td>{{$order->user()->last_name}}</td>
                    <td>{{$ticket->type()->category()->name}}</td>
                    <td style="background-color: 
                    @if ($ticket->validate)
                        green">oui</td>
                    @else
                        red">non</td>
                    @endif   
                    
                    @if ($ticket->validate)
                    <td><a href="/admin/{{$ticket->id}}/rollback">annuler</a></td>

                    @else
                    <td><a href="/admin/{{$ticket->id}}/validate">valider</a></td>
                    @endif  
                   
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
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
            
        });

        
       

    });

</script>
@endsection