<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signed up teams</title>
    <script src="https://cdn.jsdelivr.net/npm/qrcode-generator/qrcode.min.js"></script>
    <script src="{{ asset('js/createQR.js') }}"></script>
    <link rel="stylesheet" href="{{asset('css/teamsList.css')}}">
</head>
<body>
    <div>
        @if($buttons)
        <a href="{{route('admin.generatePDF',['roomID' => $room->id ])}}" class="btn btn-primary mt-3">Descargar PDF</a>
        @endif
        <h1>{{$room->roomName}}</h1>
        <input type="hidden" name="roomID" id="roomID" value="{{$room->id}}">
        <table>
            <tr>
                <th>Name</th>
                <th>Dorsal</th>
                <th>QR</th>
            </tr>
            @foreach($teams as $dorsal=>$team)
            <tr>
                <td>{{$team->teamName}}</td>
                <td>{{$dorsal}}</td>
                <td class="qrCode" id="{{$dorsal}}"></td>
            </tr>
            @endforeach
        </table>
    </div>
</body>
</html>
