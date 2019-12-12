<div class="col-md-8 bg-light">
    @if(isset($searchedData))
        <table class="table mt-lg-4">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Sanborns_id</th>
                <th scope="col">Total Cobros</th>
                <th scope="col">Importe Cobros</th>
                <th scope="col">Total Devoluciones</th>
                <th scope="col">Importe Devoluciones</th>
                <th scope="col">Detalles cuenta</th>
            </tr>
            </thead>
            <tbody>
            @foreach($searchedData as $result)
                <tr>
                    <td>{{ $result->sanborns_id }}</td>
                    @if(isset($result->charges->total))
                        <td>{{ $result->charges->total }}</td>
                    @else
                        <td>NULL</td>
                    @endif
                    @if(isset($result->charges->import))
                        <td>{{ $result->charges->import }}</td>
                    @else
                        <td>NULL</td>
                    @endif
                    @if(isset($result->returns->total))
                        <td>{{ $result->returns->total }}</td>
                    @else
                        <td>NULL</td>
                    @endif
                    @if(isset($result->returns->import))
                        <td>{{ $result->returns->import }}</td>
                    @else
                        <td>NULL</td>
                    @endif
                    <td>
                        <form action="{{ route('SearchDetails', ['sanborns_id' => $result->sanborns_id]) }}"
                              method="POST">
                            @csrf
                            <button class="btn btn-primary btn-block" type="submit">Ver</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
</div>
