<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Activity Log</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <button type="button" onclick="download()">Download</button>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>User</th>
                <th>IP</th>
                <th>Country</th>
                <th>State</th>
                <th>City</th>
                <th>Path</th>
                <th>Method</th>
                <th>Date</th>
                <th>Time</th>
                <th>Browser</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($logs as $log)
                <tr>
                    <td>{{ $log['user'] }}</td>
                    <td>{{ $log['ip'] }}</td>
                    <td>{{ $log['country'] }}</td>
                    <td>{{ $log['state'] }}</td>
                    <td>{{ $log['city'] }}</td>
                    <td>{{ $log['path'] }}</td>
                    <td>{{ $log['method'] }}</td>
                    <td>{{ $log['date'] }}</td>
                    <td>{{ $log['time'] }}</td>
                    <td>{{ $log['browser'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <script>
        function download() {
            var elt = document.querySelector('table');
            var wb = XLSX.utils.table_to_book(elt, {
                sheet: "Log"
            });
            return  XLSX.write(wb, {
                    bookType: 'xlsx',
                    bookSST: true,
                    type: 'base64'
                });
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"
        integrity="sha512-r22gChDnGvBylk90+2e/ycr3RVrDi8DIOkIGNhJlKfuyQM4tIRAI062MaV8sfjQKYVGjOBaZBOA87z+IhZE9DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>
