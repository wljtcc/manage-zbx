<html>
    <title>List Host - ZBX</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <body>

        <div class="header">
            <h1>
                Listagem dos Hosts
            </h1>
        </div>

        <div class="alert">
            <select id="listhost" onclick="showvalue">
                <?php foreach ($hosts as $h): ?>
                    <option onclick="showvalue()" value=<?= $h->hostid ?>><?= $h->host ?></option>
                <?php endforeach ?>
            </select>
        </div>

        <div class="alert-warning">
            HostId:
            <a id="input_host"></a>
        </div>


    </body>

    <script>
        var select = document.getElementById('listhost');
        var input = document.getElementById('input_host');

        select.onchange = function() {
            input.innerHTML = select.value;
        }

    </script>

</html>