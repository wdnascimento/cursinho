<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>QrCode Pix Pagseguro</title>
</head>

<body>
    @if ($data)
    <img src="{{ $data['qr_codes'][0]['links'][0]['href'] }}" alt="">
    <span>{{ $data['qr_codes'][0]['id'] }}</span>
    @endif
    @dd($data)
</body>

</html>
