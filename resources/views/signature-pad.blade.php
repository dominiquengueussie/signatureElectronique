<html>

<head>
    <title>Laravel Signature Pad Example - MyNotePaper.com</title>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script>
    <link rel="stylesheet" type="text/css" href="http://keith-wood.name/css/jquery.signature.css">
    <style>
        .kbw-signature {
            width: 100%;
            height: 200px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 mt-5">
                <div class="card">
                    <div class="card-header">
                        <h5>Laravel Signature Pad Example - polypharma90.com</h5>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                <span>{{ session('success') }}</span>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('signpad.save') }}">
                            @csrf
                            <div class="col-md-12">
                                <label class="" for="">Name:</label>
                                <input type="text" name="name" class="form-group" value="">
                            </div>
                            <div class="col-md-12">
                                <label class="" for="">Phone:</label>
                                <input type="text" name="phone" class="form-group" value="">
                            </div>
                            <div class="col-md-12">
                                <label class="" for="">Position géographique:</label>
                                <textarea placeholder="copier puis coller votre position géographique ici" name="position" id="position" cols="30" rows="0"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label>Signature:</label>
                                <br />
                                <div id="sig"></div>
                                <br /><br />
                                <button id="clear" class="btn btn-danger btn-sm">Clear</button>
                                <textarea id="signature" name="signed" style="display: none"></textarea>
                            </div>
                            <br />
                            <button class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <table class="table text-center">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NOM</th>
                    <th scope="col">TELEPHONE</th>
                    <th scope="col">position géographique</th>
                    <th scope="col">SIGNATURE</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($signatures as $signat)
                    <tr>
                        <td scope="row">{{ $signat->id }}</td>
                        <td>{{ $signat->name }}</td>
                        <td>{{ $signat->phone }}</td>
                        <td><a href="{{ url($signat->position)}}">position géographique</a></td>
                        <td class="rounded"><img src="{{ asset('images/' . $signat->signature) }}" width="100"
                                height="100" alt="signature"></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
    <script type="text/javascript">
        var sig = $('#sig').signature({
            syncField: '#signature',
            syncFormat: 'PNG'
        });
        $('#clear').click(function(e) {
            e.preventDefault();
            sig.signature('clear');
            $("#signature64").val('');
        });
    </script>
</body>

</html>
