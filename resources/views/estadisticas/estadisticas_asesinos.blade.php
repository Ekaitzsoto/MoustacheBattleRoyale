<table class="table table-striped">
    <thead>
        <tr class="">
            <th scope="col">Nombre</th>
            <th scope="col" class="text-center">Kills</th>
            <th scope="col" class="text-end">Equipo</th>
        </tr>
    </thead>
    <tbody>
            @forelse ($topAsesinos as $asesino)

                <tr>
                <td scope="col">{{$asesino->nombre}}</td>
                <td scope="col" class="text-center">{{$asesino->kills}}</td>
                <td scope="col" class="text-end">{{$asesino->equipo->nombre}}</td>
                </tr>
            @empty
            <tr>
                <td scope="col" class="text-center" colspan="3">-</td>
            </tr>
            @endforelse
    </tbody>
</table>
