<table class="table table-striped">
    <thead>
    <tr style="background: pink">
        <th>#SL</th>
        <th>DATE</th>
        <th>INVOICE</th>
        <th>EXPENSE HEAD</th>
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
            <td>{{ $report->name }}</td>
            <td>{{ $report->delivery_man }}</td>
            <td>{{ \App\Models\Staff::find($report->sr_id)->name }}</td>
            <td style="text-align: right;padding-right: 8px;">{{ number_format($report->amount,2) }}</td>
        </tr>
    @endforeach
    <tr>
        <td style="text-align: right;" colspan="6"></td>
        <td style="text-align: right;padding-right: 8px;font-weight: bold;">{{ number_format($total,2) }}</td>
    </tr>
    </tbody>
</table>
<br>
<a href="{{ route('print.expense.report',['from_date'=>$from_date,'to_date'=>$to_date]) }}" class="btn btn-danger">PRINT</a>
