<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Show Data</title>
</head>

<body>
    <div class="container">
        <a href="{{url('/add-data')}}" class="btn btn-primary my-3">Add Data</a>
        @if(Session::has('msg'))
        <p id="flash-message" class="alert alert-success">
            {{ Session::get('msg') }}
        </p>
        @endif

        <script>
            setTimeout(function() {
                let msg = document.getElementById('flash-message');
                if (msg) {
                    msg.style.display = 'none';
                }
            }, 2000); // 5000ms = 5s
        </script>


        <table class="table table-striped table-hover mb-0">
            <thead class="table-success">
                <tr>
                    <th scope="col">SL</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach($showData as $key=>$Data)
                <tr>
                    <td>{{{ $key+1}}}</td>
                    <td>{{{ $Data->name}}}</td>
                    <td>{{{ $Data->email}}}</td>

                </tr>
                @endforeach

            </tbody>
        </table>
        <div class="d-flex justify-content-left">
            {{ $showData->links() }}
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>