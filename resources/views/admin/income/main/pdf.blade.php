<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="card mb-3">
        <div class="card-header">
            <div class="row">
                <div class="col-md-8 card_title_part">
                    <h1 class="text-center">PANDA</h1>
                    <h6 class="text-center">All Income Information</h6>
                </div>
                <div class="col-md-4 card_button_part">
                    @php
                    echo date("d/M/Y | h:i:s A");
                    @endphp
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="alltableinfo" class="table table-bordered table-striped table-hover custom_table">
                <thead class="table-dark">
                    <tr>
                        <th>Date</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($all as $data)
                    <tr>
                        <td>{{date('d-m-Y',strtotime($data->income_date))}}</td>
                        <td>{{$data->income_title}}</td>
                        <td>{{$data->categoryInfo->incate_name}}</td>
                        <td>{{number_format($data->income_amount,2)}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer text-center">
            <div>
                <p><b>NOTE:</b> This is computer generated receipt and does not require physical signature.</p>
            </div>
        </div>
    </div>


    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->
</body>

</html>