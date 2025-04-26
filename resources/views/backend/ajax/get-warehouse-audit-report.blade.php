<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0">Warehouese Audit Report</h5>
    </div>
    <div class="card-body pb-2">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive text-nowrap table-min-height table_border_style">
                    <table class="table table-striped" id="invoice_table">
                        <tbody class="table-border-bottom-0">
                        <tr>
                            <td>Audit Officer</td>
                            <td>Warehouse Keeper</td>
                            <td>Product</td>
                            <td>Software Stock</td>
                            <td>Audit Stock</td>
                            <td>Short Stock</td>
                            <td>Over Stock</td>
                        </tr>
                        @foreach($audits as $audit)
                        <tr>
                            <td>{{ $audit->officer_name }}</td>
                            <td>{{ \App\Models\Staff::where('id',$audit->store_keeper_id)->first()->name }}</td>
                            <td>{{ $audit->product_name }}</td>
                            <td>
                                @php
                                    if($audit->audit_flow == 1){
                                        $software_stock = $audit->audit_stock+$audit->short_stock;
                                    }else if($audit->audit_flow == 2){
                                        $software_stock = $audit->audit_stock-$audit->over_stock;
                                    }else{
                                        $software_stock = $audit->audit_stock;
                                    }
                                @endphp
                                {{ $software_stock }} cs
                            </td>
                            <td>{{ $audit->audit_stock }} cs</td>
                            <td>{{ $audit->short_stock }} cs</td>
                            <td>{{ $audit->over_stock }} cs</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <br>
                    <a href="{{ route('print.warehouse.audit.report',$audit_name_id) }}" class="btn btn-danger">PRINT</a>

                </div>
            </div>
        </div>
    </div>
</div>
