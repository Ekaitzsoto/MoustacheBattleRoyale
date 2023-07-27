<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col" class="text-center">Kills</th>
        </tr>
    </thead>
    <tbody>
            @forelse ($equiposConMasKills as $equipo)
                <tr>
                    <td scope="col">{{$equipo->nombre}}</td>
                    <td scope="col" class="text-center">{{$equipo->jugadores_sum_kills}}</td>
                </tr>
            @empty
            <tr>
                <td scope="col" class="text-center" colspan="3">-</td>
            </tr>
            @endforelse
    </tbody>
</table>
