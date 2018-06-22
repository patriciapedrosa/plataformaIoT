    @extends('layouts.app');
    @section('content');
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2>Lista de Esps
                        </h2>

                        
                        <br>Número de esps: 
                        <span>{{$total}}</span> 
                        
                        <br>Número de esps ligados: 
                        <span>{{$status}}</span> 
                        

                        
                        
                    </div>
                    @if (count($esps)) 
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>MAC</th>
                                <th>Estado</th>
                                <th>Ligar/Desligar</th>
                                <th>Sensores</th>
                            </tr>
                        </thead>
                        @foreach ($esps as $esp) 
                        <tr>
                            <td>{{$esp->mac}}</td>
                            <td>{{$esp->statusToStr()}}</td>
                            <td>
                                @if($esp->status == '0')
                                <form action="{{ route('esp.turnOn',$esp->id) }}" method="post" class="form-group">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <button type="submit"  class="btn btn-success" name="ok">Ligar</button>
                                    </div>
                                </form>
                                @else
                                <form action="{{ route('esp.turnOff',$esp->id) }}" method="post" class="form-group">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <button type="submit"  class="btn btn-danger" name="ok">Desligar</button>
                                    </div>
                                </form>
                                @endif
                            </td>
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