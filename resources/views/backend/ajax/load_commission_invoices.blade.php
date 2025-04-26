@php
    $total_due = 0;
@endphp
@foreach($invoices as $index => $invoice)
    @php
        $total_due += $invoice->amount;
    @endphp
    <tr>
        <td>{{ $index+1 }}</td>
        <td>{{ $invoice->outlet_name }}</td>
        <td>{{ $invoice->offer_name }}</td>
        <td>{{ number_format($invoice->amount,2) }}</td>
        <td>{{ $invoice->invoice }}</td>
    </tr>
@endforeach
<tr>
    <td colspan="3"></td>
    <td><strong>{{ $total_due }} /=</strong></td>
    <td></td>
</tr>
