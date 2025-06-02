<div>
    <h1>Hasil Penjumlahan<h1>
    {{ $bil1 }} + {{ $bil2 }} + {{ $bil3 }} = {{ $total }}
    <br/>
    <br/>
    @if ($bil3 == 0)
        Bilangan ke 3 tidak diisi
    @endif
</div>