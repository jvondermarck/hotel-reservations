<h1>Getting Started</h1>

<ul>
    <li>
        <h2>{{ $data['Enterprise']['Name'] }}</h2>
        <p>{{ $data['Enterprise']['Address']['Line1'] }}, {{ $data['Enterprise']['Address']['City'] }}, {{ $data['Enterprise']['Address']['CountryCode'] }}</p>
        <p>Phone: {{ $data['Enterprise']['Phone'] }}, Email: {{ $data['Enterprise']['Email'] }}</p>
    </li>
</ul>
