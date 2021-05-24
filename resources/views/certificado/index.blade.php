

<div class="container">
    <h2>Lista de Certificados <a href="certificados/create"><button type="button" class="btn btn-success float-right">Agregar Certificados</button></a></h2>
    <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Nro Certificado</th>
            <th scope="col">Emisión</th>
            <th scope="col">Fecha Válida</th>
            <th scope="col">Titular</th>
            <th scope="col">Rubro</th>
            <th scope="col">Comercio</th>
            <th scope="col">Observacion</th>
            <th scope="col">Previa</th>
            <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($certificados as $certificado)

            <tr>
            <th scope="row">{{$certificado->id}}</th>
            <td>{{$certificado->nro_certificado}}</td>
            <td>{{date('d/m/y', strtotime($certificado->fecha))}}</td>
            <td>{{date('d/m/y', strtotime($certificado->desde))}} | {{date('d/m/y', strtotime($certificado->hasta))}}</td>
            <td>{{$certificado->nombre_comerciante}}</td>
            <td>{{$certificado->rubro}}</td>
            <td>{{$certificado->nombre_comercio}}</td>
            <td>{{$certificado->observaciones}}</td>
            <td>{{$certificado->previa}}</td>
            <td>
                <a href="{{ route('certificados.show', $certificado->id) }}"><button type="button" class="btn btn-secondary">Ver CIU</button></a>
                <form action="{{ route('certificados.destroy', $certificado->id) }}" method="POST">
                  
                  {{-- <a href="{{ route('certificados.edit', $certificado->id) }}"><button type="button" class="btn btn-info">Editar</button></a> --}}
                  @method('DELETE')
                  @csrf
                  {{-- <button type="submit" class="btn btn-danger">Borrar</button> --}}
                </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
</div>    
