<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0">ORDER SUMMERY</h5>
    </div>
    <div class="card-body pb-2">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive text-nowrap table-min-height table_border_style">
                    <form action="{{ route('stock.return.for.all.invoice.together') }}" method="get">
                        <table class="table table-striped" id="invoice_table">
                            <tbody class="table-border-bottom-0">
                                <tr>
                                    <td>ডেলিভারী শতকরা</td>
                                    <td>=</td>
                                    <td>(ডেলিভারী হয়েছে যত টাকা * 100)/সর্বমোট যত টাকার অর্ডার হয়েছিল</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>=</td>
                                    <td>( {{ number_format($total_sale_amount,2) }} * 100 ) / {{ number_format($total_stock_out_amount,2) }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>=</td>
                                    <td>
                                        @php
                                        if($total_stock_out_amount < 1){
                                          echo "0 %";
                                          $result_one = 0;
                                        }else{
                                            $result_one = (($total_sale_amount*100)/$total_stock_out_amount);
                                            echo $result_one." %";
                                        }
                                        @endphp
                                    </td>
                                </tr>
                                <tr>
                                    <td>ফেরৎ শতকরা</td>
                                    <td>=</td>
                                    <td>(ফেরৎ এসেছে যত টাকা * 100)/সর্বমোট যত টাকার অর্ডার হয়েছিল</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>=</td>
                                    <td>( {{ number_format($total_stock_return_amount,2) }} * 100 ) / {{ number_format($total_stock_out_amount,2) }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>=</td>
                                    <td>
                                        @php
                                            if($total_stock_out_amount < 1){
                                              echo "0 %";
                                              $result_two = 0;
                                            }else{
                                                $result_two = (($total_stock_return_amount*100)/$total_stock_out_amount);
                                                echo $result_two." %";
                                            }
                                        @endphp
                                    </td>
                                </tr>
                                <tr>
                                    <td>ফলাফল</td>
                                    <td>=</td>
                                    <td>@php $final_result = $result_one+$result_two; @endphp {{ $result_one }} % + {{ $result_two }} % = {{ $final_result }} %</td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
