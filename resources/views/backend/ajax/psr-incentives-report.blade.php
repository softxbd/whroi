<table class="table table-striped">
    <thead>
    <tr style="background: pink">
        <th>#SL</th>
        <th>DATE</th>
        <th>INVOICE</th>
        <th>OUTLET</th>
        <th>OFFER NAME</th>
        <th>DELIVERY MAN</th>
        <th>SR</th>
        <th style="text-align: right;">AMOUNT</th>
    </tr>
    </thead>
    <tbody>
    @php
        $total_commission = 0;
    @endphp
    @foreach($reports as $index => $report)
        @php
            $total_commission += $report->disburse_amount;
        @endphp
        <tr>
            <td>{{ $index+1 }}</td>
            <td>{{ $report->created_at }}</td>
            <td>{{ $report->invoice }}</td>
            <td>{{ $report->outlet_name }}</td>
            <td>{{ $report->offer_name }}</td>
            <td>{{ $report->delivery_man_id }}</td>
            <td>{{ $report->sr_id }}</td>
            <td style="text-align: right;">{{ number_format($report->disburse_amount,2) }}</td>
        </tr>
    @endforeach
    <tr>
        <td style="text-align: right;" colspan="7">TOTAL</td>
        <td style="text-align: right;">{{ number_format($total_commission,2) }}</td>
    </tr>
    </tbody>
</table>
<br>
<a href="{{ route('print.psr.incentives.report',['from_date'=>$from_date,'to_date'=>$to_date]) }}" class="btn btn-danger">PRINT</a>
