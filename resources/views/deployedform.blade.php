<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fill Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>

<body>
    <h1 style="padding: 10px;">
        @if ($form)
            {{ $form->form_name }}
        @endif
    </h1>
    <form action="/deployedpost/{{ Request::segment(2) }}" method="post" style="padding: 10px;">
        @csrf
        <table style="width: 100%; background-color: white; padding-bottom: 10px; margin-bottom: 10px;">
            @foreach ($fields as $key => $f)
                <tr style="width: 100%;">
                    <td style="width: 100%;">{{ $f->field_label }}</td>
                </tr>
                <tr>
                    <td style="width: 100%;">
                        <input type="text" value="" name="{{ f->field_name }}" style="width: 100%;" />
                    </td>
                </tr>
            @endforeach
        </table>
    </form>
    <button type="button" class="btn btn-primary" style="margin-left: 10px;">Save</button>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>
