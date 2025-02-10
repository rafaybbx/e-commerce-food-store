<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Autocomplete Example</title>

    <script src="{{ asset("dada.js") }}"></script>

</head>

<body>

    <h2>Autocomplete Example</h2>
    <div class="search">
        <input id="searchbar" class="nav-input" type="text" name="s" autocomplete="off"
            placeholder="Search for products">
        <i class="fa-solid fa-magnifying-glass"></i>
    </div>
    <ul id="searchlist" cla>

    </ul>

</body>

</html>
