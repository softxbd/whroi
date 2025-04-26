<table class="table table-striped">
    <thead>
    <tr style="background: pink">
        <th>#SL</th>
        <th>DATE</th>
        <th>INVOICE</th>
        <th>OUTLET</th>
        <th>DELIVERY MAN</th>
        <th>SR</th>
        <th>AMOUNT</th>
    </tr>
    </thead>
    <tbody>
    @foreach($reports as $index => $report)
        <tr>
            <td>{{ $index+1 }}</td>
            <td>{{ $report->created_at }}</td>
            <td>{{ $report->invoice }}</td>
            <td>{{ $report->outlet_name }}</td>
            <td>{{ $report->delivery_man_id }}</td>
            <td>{{ $report->sr_id }}</td>
            <td>{{ $report->amount }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
<br>
<a href="{{ route('print.due.report',['from_date'=>$from_date,'to_date'=>$to_date]) }}" class="btn btn-danger">PRINT</a>
