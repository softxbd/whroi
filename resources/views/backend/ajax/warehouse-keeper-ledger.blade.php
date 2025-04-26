<table class="table table-striped">
    <thead>
    <tr style="background: pink">
        <th>#SL</th>
        <th>DATE</th>
        <th>INVOICE</th>
        <th>AUDIT NAME</th>
        <th>WAREHOUSE KEEPER NAME</th>
        <th>TRANSACTION TYPE</th>
        <th>TRANSACTION AMOUNT</th>
        <th>CLOSING BALANCE</th>
    </tr>
    </thead>
    <tbody>
    @foreach($reports as $index => $report)
        <tr>
            <td>{{ $index+1 }}</td>
            <td>{{ $report->created_at }}</td>
            <td>{{ $report->invoice }}</td>
            <td>{{ $report->audit_name }}</td>
            <td>{{ $report->staff_name }}</td>
            <td>{{ $report->transaction_type }}</td>
            <td>{{ $report->transaction_amount }}</td>
            <td>{{ $report->closing_balance }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
<br>
<a href="{{ route('print.warehouse.keeper.ledger',['from_date'=>$from_date,'to_date'=>$to_date]) }}" class="btn btn-danger">PRINT</a>
