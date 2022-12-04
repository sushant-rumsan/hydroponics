<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Append child</title>
</head>
<body>
    <div id="parent"></div>

    <script>
        parent = document.getElementById('parent');
        parentChild = document.createElement('h1');
        parentChild.textContent = "helloo";
        parent.appendChild(parentChild);
    </script>
</body>
</html>