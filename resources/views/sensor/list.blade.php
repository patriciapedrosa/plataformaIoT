    @extends('layouts.app');
    @section('content');
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" >
                        <h2>
                            Lista de Sensores
                        </h2>


                        <br>Número de sensores: 
                            <span>{{$total}}</span> 
                        
                        <br>Tipo de sensores: 
                        @foreach ($tipo as $tip) 
                        
                            <span>{{$tip->name}}</span> 
                            
                             @endforeach
                        
                        


                    </div>

                    @if (count($sensors)) 
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Sensor</th>
                                <th>Data</th>
                                <th>SSID</th>
                            </tr>
                        </thead>
                        @foreach ($sensors as $sensor) 
                        
                        <tr>
                            <td>{{$sensor->name}}={{$sensor->valor}}{{$sensor->grandeza}}</td>
                            <td>{{$sensor->created_at}}</td>
                            <td>{{$sensor->ssid}}</td>

                            
                        </tr>
                        @endforeach

                    </table>
                    <div class="text-center"> 
                        {!!$sensors->links();!!}
                    </div>  

                    @else 

                    <h3>Não foram encontrados sensores</h3>
                    @endif
                    @endsection