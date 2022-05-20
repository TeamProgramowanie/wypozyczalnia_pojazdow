<x-layout>
    <h2 class="text-center mb-4">{{ $pojazdy->nr_pojazdu }}</h2>

    <table>
        <tr>
            <th>Typ pojazdu</th>
            <th colspan="3">Pojazd</th>
            <th>Stan</th>
            <th>Przebieg</th>
            <th>Pojemność baku</th>
            @auth
            <th colspan="2">Zarządzanie</th>
            @endauth
        </tr>

            <tr>
                <td>{{ $pojazdy->s_typ_pojazdu->name }}</td>
                <td colspan="3">{{ $pojazdy->s_model->name }} {{ $pojazdy->s_marka->name }} {{ $pojazdy->wersja }}</td>
                <td>{{ $pojazdy->stan }}</td>
                <td>{{ $pojazdy->przebieg }}</td>
                <td>{{ $pojazdy->pojemnosc_baku }}</td>
                @auth
                <td><a class="btn btn-info ms-md-2" href="/pojazdy/{{ $pojazdy->id }}/edit">Edytuj wpis</a></td>
                <td>
                    <form method="POST" action="/pojazdy/{{ $pojazdy->id }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger ms-md-2" type="submit">Usuń wpis</button>
                    </form>
                </td>
                @endauth
            </tr>
    </table>
    <br>
    <a class="btn btn-success ms-md-2" href="/pojazdy">Powrót do listy pojazdów</a>

</x-layout>
