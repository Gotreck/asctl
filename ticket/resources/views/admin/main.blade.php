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
                

                @foreach ($order->tickets as $ticket)
                    {{-- TODO : https://datatables.net/examples/api/form.html --}}
                <tr>
                    <td>{{$ticket->id}}</td>
                    <td>{{$order->user()->first_name}}</td>
                    <td>{{$order->user()->last_name}}</td>
                    <td>{{$ticket->type()->category()->name}}</td>
                    <td><input type="text" name="" id="" value="{{$order->validate}}"></td>
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