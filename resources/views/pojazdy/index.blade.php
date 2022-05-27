<x-layout>
    <h2 class="text-center mb-4">Lista pojazdów</h2>

    <table class="table table-dark">
        <tr>
            <th scope="col">NR pojazdu</th>
            <th scope="col">Kategoria pojazdu</th>
            <th scope="col">Typ pojazdu</th>
            <th scope="col" colspan="3">Pojazd</th>
            <th scope="col">Stan</th>
            <th scope="col">Cena</th>
            @can('pracownik')
                <th scope="col">Opcja</th>
            @endcan
        </tr>

        @foreach($pojazdy as $pojazd)
            <tr scope="row">
                <td><a href="{{ route('pojazdy.show', ['pojazd' => $pojazd->id]) }}">{{ $pojazd->nr_pojazdu }}</a></td>
                <td>{{ $pojazd->s_typ_pojazdu->name }}</td>
                <td>{{ $pojazd->s_typ_pojazdu->typ_pojazdu }}</td>
                <td colspan="3">{{ $pojazd->s_model->name }} {{ $pojazd->s_marka->name }} {{ $pojazd->wersja }}</td>
                <td>{{ $pojazd->stan }}</td>
                <td>{{ $pojazd->cena }} zł</td>
                @can('pracownik')
                    <td style="text-align: center"><a class="btn btn-primary text-center " role="button" href="{{ route('wypozyczenia.create') }}">Wypożycz</a></td>
                @endcan
            </tr>

        @endforeach
    </table>


{{--    <div class="mt-6 p-4">--}}
{{--        {{ $pojazdy->links() }}--}}
{{--    </div>--}}
</x-layout>
