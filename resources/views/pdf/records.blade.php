<!DOCTYPE html>
<html>
<head>
    <title>User Records PDF</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
        }
        table {
            width: 100%;
            margin-bottom: 20px;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>User Records</h1>
    @foreach($records as $record)
    <table class="table table-bordered table-striped">
        <tr>
            <th>Name</th>
            <td>{{ $record->name }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $record->email }}</td>
        </tr>
        <tr>
            <th>Category</th>
            <td>{{ $record->category->category }}</td>
        </tr>
        <tr>
            <th>Address</th>
            <td>{{ $record->address }}</td>
        </tr>
        <tr>
            <th>Phone No</th>
            <td>{{ $record->phone_no }}</td>
        </tr>
        <tr>
            <th>Workplace</th>
            <td>{{ $record->workplace }}</td>
        </tr>
        <tr>
            <th>State</th>
            <td>{{ $record->state }}</td>
        </tr>
        <tr>
            <th>Country</th>
            <td>{{ $record->country }}</td>
        </tr>
        <tr>
            <th>Date of Birth</th>
            <td>{{ $record->dob }}</td>
        </tr>
        <tr>
            <th>Next of Kin Name</th>
            <td>{{ $record->nok_name }}</td>
        </tr>
        <tr>
            <th>Next of Kin Email</th>
            <td>{{ $record->nok_email }}</td>
        </tr>
        <tr>
            <th>Next of Kin Phone No</th>
            <td>{{ $record->nok_phone_no }}</td>
        </tr>
        <tr>
            <th>Next of Kin Address</th>
            <td>{{ $record->nok_address }}</td>
        </tr>
        <tr>
            <th>COS</th>
            <td>{{ (!empty($record->cos))?'Uploaded':'Not Uploaded' }}</td>
        </tr>

        <tr>
            <th>Comment</th>
            <td>{{ $record->comment }}</td>
        </tr>
        <tr>
            <th>Biometrics</th>
            <td>{{ (count($biometrics) > 0) ? 'Uploaded':'Not Uploaded'}}</td>
        </tr>
        <tr>
            <th>Payslip</th>
            <td>{{ (count($payslips) > 0) ? 'Uploaded':'Not Uploaded'}}</td>
        </tr>
        <tr>
            <th>Other Documents</th>
            <td>{{ (count($otherDocs) > 0) ? 'Uploaded':'Not Uploaded'}}</td>
        </tr>
        @foreach($needs as $need)
        <tr>
            <th>Need</th>
            <td>{{ $need->need }}</td>
        </tr>
        @endforeach
    </table>
    @endforeach
</body>
</html>
