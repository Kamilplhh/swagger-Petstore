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
        <form method="POST" class="text-center">
            <h4>Dodaj zwierzęcie</h4>
            <div class="form-group">
                <label for="name">Nazwa</label>
                <input class="form-control" type="text" id="name" placeholder="Nazwa zwierzęcia" required>
            </div>
            <div class="form-group">
                <label for="id">ID zwierzęcia</label>
                <input class="form-control" type="number" id="id" placeholder="ID" required>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status">
                    <option value="" selected disabled>Status</option>
                    <option value="1">Available</option>
                    <option value="2">Pending</option>
                    <option value="3">Sold</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Dodaj</button>
        </form>

        <h4 class="text-center pt-2">Wyszukaj zwierzęcie po statusie lub po ID</h4>
        <div class="row">
            <div class="col-md-6">
                <form method="POST" class="text-center">
                    <div class="form-group">
                        <label for="id">ID zwierzęcia</label>
                        <input class="form-control" type="number" id="id" placeholder="ID" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Wyszukaj</button>
                </form>
            </div>
            <div class="col-md-6">
                <form method="POST" class="text-center">
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status">
                            <option value="1">Available</option>
                            <option value="2">Pending</option>
                            <option value="3">Sold</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Wyszukaj</button>
                </form>
            </div>
        </div>

    </div>
</body>

</html>