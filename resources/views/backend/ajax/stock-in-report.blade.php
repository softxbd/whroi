<table class="table table-striped">
    <thead>
    <tr style="background: pink">
        <th>#SL</th>
        <th>DATE</th>
        <th>INVOICE</th>
        <th>PRODUCT</th>
        <th>QUANTIRY</th>
    </tr>
    </thead>
    <tbody>
@foreach($reports as $index => $report)
    <tr>
        <td>{{ $index+1 }}</td>
        <td>{{ $report->created_at }}</td>
        <td>{{ $report->invoice }}</td>
        <td>{{ $report->product_name }}</td>
        <td>
            @php
                $quantity = $report->quantity;
                $pcs_in_case = $report->pcs_in_case;

                if($report->caret == 0 && $report->bottle == 0){
                    $output = $quantity/$pcs_in_case;
                    if (str_contains($output, '.')) {
                        $explode = explode(".",$output);
                        $case = $explode[0];
                        $total_pcs_after_division = $case*$pcs_in_case;
                        $pcs = $quantity-$total_pcs_after_division;
                        echo $case."/".$pcs;
                    }else{
                        $case = $output;
                        $pcs = 0;
                        echo $case."/".$pcs;
                    }
                }else{
                    echo $quantity;
                }
            @endphp
        </td>
    </tr>
@endforeach
</table>
<br>
<a href="{{ route('print.stock.in.report',['from_date'=>$from_date,'to_date'=>$to_date]) }}" class="btn btn-danger">PRINT</a>
