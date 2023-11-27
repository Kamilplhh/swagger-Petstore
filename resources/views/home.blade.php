<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Netgraf-Test task</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    @vite('resources/js/app.js')
    @vite('resources/css/app.css')
</head>

<body>
    <div class="container pt-2">
        <form method="POST" class="text-center" action="{{ route('addPet') }}">
            @csrf
            <h4>Dodaj zwierzęcie</h4>
            <div class="form-group">
                <label for="name">Nazwa</label>
                <input class="form-control" type="text" name="name" id="name" placeholder="Nazwa zwierzęcia" required>
            </div>
            <div class="form-group">
                <label for="id">ID zwierzęcia</label>
                <input class="form-control" type="number" name="id" min="0" step="1" id="id" placeholder="ID" required>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" name="status" id="status">
                    <option value="" selected disabled>Status</option>
                    <option value="available">Available</option>
                    <option value="pending">Pending</option>
                    <option value="sold">Sold</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Dodaj</button>
        </form>

        <h4 class="text-center pt-2">Wyszukaj zwierzęcie po statusie lub po ID</h4>
        <div class="row">
            <div class="col-md-6">
                <form method="POST" class="text-center" action="{{ route('searchPetID') }}">
                @csrf
                    <div class="form-group">
                        <label for="id">ID zwierzęcia</label>
                        <input class="form-control" type="number" min="0" step="1" name="id" id="id" placeholder="ID" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Wyszukaj</button>
                </form>
            </div>
            <div class="col-md-6">
                <form method="POST" class="text-center" action="{{ route('searchPetStatus') }}">
                @csrf
                    <div class="form-group">
                        <label for="status">Status (losowe 10 pozycji)</label>
                        <select class="form-control" id="status" name="status">
                            <option value="available">Available</option>
                            <option value="pending">Pending</option>
                            <option value="sold">Sold</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Wyszukaj</button>
                </form>
            </div>
        </div>

        @if(isset($message))
        <div class="alert alert-warning text-center pt-2" role="alert">
            {{ $message }}
        </div>
        @endif

        @if(isset($pet))
        <form method="POST" action="{{ route('addPet') }}">
            @csrf
            <div class="border my-3 py-1">
                <div class="row text-center">
                    <div class="col-3">
                        ID zwierzęcia:
                    </div>
                    <div class="col-3">
                        Nazwa zwierzęcia:
                    </div>
                    <div class="col-3">
                        Status zwierzęcia:
                    </div>
                    <div class="offset-1 col-2">
                        <button type="button" class="btn btn-danger remove" id="{{ $pet['id'] }}">Usuń</button>
                    </div>
                    <div class="col-3">
                        <input class="form-control" type="number" name="id" min="0" step="1" id="id" value="{{ $pet['id'] }}" required disabled>
                    </div>
                    <div class="col-3">
                        <input class="form-control" type="text" name="name" id="name" value="{{ $pet['name'] }}" required disabled>
                    </div>
                    <div class="col-3">
                        <select class="form-control" id="status" name="status" disabled>
                            @if(isset($pet['status']))
                            <option value="" selected disabled>{{ $pet['status'] }}</option>
                            @endif
                            <option value="available">Available</option>
                            <option value="pending">Pending</option>
                            <option value="sold">Sold</option>
                        </select>
                    </div>
                    <div class="offset-1 col-2">
                        <button type="button" class="btn btn-primary edit">Edytuj</button>
                        <button type="submit" class="btn btn-primary submit off">Zatwierdź</button>
                    </div><br>
                </div>
            </div>
        </form>
        @endif

        @if(isset($pets))
        @foreach($pets as $pet)
        <form method="POST" action="{{ route('addPet') }}">
            @csrf
            <div class="border my-3 py-1">
                <div class="row text-center">
                    <div class="col-5">
                        ID zwierzęcia:
                    </div>
                    <div class="col-5">
                        Nazwa zwierzęcia:
                    </div>
                    <div class="col-2">
                        <button type="button" class="btn btn-danger remove" id="{{ $pet['id'] }}">Usuń</button>
                    </div>
                    <div class="col-5">
                        <input class="form-control" type="number" name="id" min="0" step="1" id="id" value="{{ $pet['id'] }}" required disabled>
                    </div>
                    <div class="col-5">
                        <input class="form-control" type="text" name="name" id="name" value="{{ $pet['name'] }}" required disabled>
                    </div>
                    <div class="col-2">
                        <button type="button" class="btn btn-primary edit">Edytuj</button>
                        <button type="submit" class="btn btn-primary submit off">Zatwierdź</button>
                    </div><br>
                </div>
            </div>
        </form>
        @endforeach
        @endif

    </div>
</body>

</html>