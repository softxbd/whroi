@php
    $total_due = 0;
@endphp
@foreach($invoices as $index => $invoice)
    @php
        $total_due += $invoice->purchase_price;
    @endphp
    <tr>
        <td>{{ $index+1 }}</td>
        <td>{{ $invoice->outlet_name }}</td>
        <td>{{ number_format($invoice->purchase_price,2) }}</td>
        <td>{{ $invoice->invoice }}</td>
    </tr>
@endforeach
<tr>
    <td colspan="2"></td>
    <td><strong>{{ $total_due }} /=</strong></td>
    <td></td>
</tr>
