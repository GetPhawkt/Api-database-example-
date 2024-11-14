<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database API Example</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>Database API AJAX Commands</h1>
    <button id="createTable">Create Table</button>
    <button id="deleteTable">Delete Table</button>
    <button id="insertData">Insert Data</button>
    <button id="readData">Read Data</button>

    <script>
        $(document).ready(function() {
            $('#createTable').click(function() {
                $.ajax({
                    url: 'api.php',
                    type: 'POST',
                    data: { action: 'createTable', tableName: 'test', columns: 'id INT AUTO_INCREMENT PRIMARY KEY, name VARCHAR(255)' },
                    success: function(response) {
                        alert(response);
                    }
                });
            });

            $('#deleteTable').click(function() {
                $.ajax({
                    url: 'api.php',
                    type: 'POST',
                    data: { action: 'deleteTable', tableName: 'test' },
                    success: function(response) {
                        alert(response);
                    }
                });
            });

            $('#insertData').click(function() {
                $.ajax({
                    url: 'api.php',
                    type: 'POST',
                    data: { action: 'insertIntoTable', tableName: 'test', columns: 'name', values: "'John Doe'" },
                    success: function(response) {
                        alert(response);
                    }
                });
            });

            $('#readData').click(function() {
                $.ajax({
                    url: 'api.php',
                    type: 'POST',
                    data: { action: 'readTable', tableName: 'test' },
                    success: function(response) {
                        alert(response);
                    }
                });
            });
        });
    </script>
</body>
</html>