<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excel File Upload</title>

    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>

<div class="container">
    <h2>Upload Excel File</h2>

    @if (session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('upload.excel') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="excel_file">Choose Excel File</label>
            <input type="file" name="excel_file" id="excel_file" accept=".xlsx, .xls, .csv" required>
        </div>

        <div class="form-group">
            <button type="submit">Upload File</button>
        </div>

        @if ($errors->any())
            <div class="error-message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    </form>
</div>

</body>
</html>
