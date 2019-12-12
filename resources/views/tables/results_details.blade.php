<table class="table mt-lg-4">
    <thead class="thead-dark">
    <tr>
        <th scope="col">Cuenta</th>
        <th scope="col">Fecha</th>
        <th scope="col">Importe</th>
        <th scope="col">Respuesta</th>
        <th scope="col">Referencia</th>
        <th scope="col">Source</th>
        <th scope="col">Tipo</th>
    </tr>
    </thead>
    <tbody>
    @foreach($details as $detail)
        <tr>
            <td>{{ $detail->sanborns_id }}</td>
            <td>{{ $detail->date }}</td>
            <td>{{ $detail->import }}</td>
            @if($detail->answer == 00)
                <td class="text-success">{{ $detail->answer }}</td>
            @elseif($detail->answer != 00)
                <td class="text-danger">{{ $detail->answer }}</td>
            @else
                <td>NULL</td>
            @endif
            <td>{{ $detail->reference }}</td>
            <td>{{ $detail->source }}</td>
            @if($detail->type == 'Cobro')
                <td class="text-success">{{ $detail->type }}</td>
            @else
                <td class="text-danger">{{ $detail->type }}</td>
            @endif
        </tr>
    @endforeach
    </tbody>
</table>
