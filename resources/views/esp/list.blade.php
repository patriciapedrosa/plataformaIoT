    @extends('layouts.app');
    @section('content');
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2>Lista de Esps
                        </h2>

                        
                    </div>
                    @if (count($esps)) 
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>MAC</th>
                                <th>Nome</th>
                                
                                <th>Sensores</th>
                            </tr>
                        </thead>
                        @foreach ($esps as $esp) 
                        <tr>
                            <td>{{$esp->thingId}}</td>
                            <td>{{$esp->thingNome}}</td>
                            
                            <td>
                                <a class="btn btn-info" href="{{route('sensor.list', $esp->id)}}">Ver sensores</a>
                            </td>
                            
                            
                        </tr>
                        @endforeach
                    </table>
                    <div class="text-center"> 
                        {!!$esps->links();!!}
                    </div>  
                    @else 
                    <h3>Não foram encontrados Esps</h3>
                    @endif

                    
                    @endsection