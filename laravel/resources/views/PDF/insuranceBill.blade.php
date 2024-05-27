<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ccc;
        }
        th {
            background-color: #f2f2f2;
        }
        td {
            text-align: left;
        }
    </style>
</head>
<body>
    <?php $totalPrice = 0 ?>
    <div class="container">
        <h2>Insurance bill</h2>
        <h3>{{ $insurance->insuranceName }}</h3>
        <img src="{{asset('images/logo.png')}}" alt="Logo" width="200" height="135">
        <table>
            <tr>
                <th>Concept</th>
                <th>Price</th>
            </tr>
            @foreach($rooms as $room)
            {{ $totalPrice += $room->roomPromotionCost }}
            <tr>
                <td>{{ $room->roomName }}</td>
                <td>{{ $room->roomPromotionCost }} €</td>
            </tr>
            @endforeach
            <tr>
                <td>Total expenses</td>
                <td> {{ $totalPrice }} €</td>
            </tr>
        </table>
    </div>
</body>
</html>
