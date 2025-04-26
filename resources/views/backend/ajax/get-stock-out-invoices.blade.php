<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0">{{ $invoice_count }} INVOICE FOUND</h5>
    </div>
    <div class="card-body pb-2">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive text-nowrap table-min-height table_border_style">
                    <form action="{{ route('stock.return.for.all.invoice.together') }}" method="get">
                    <table class="table table-striped" id="invoice_table">
                        <thead>
                        <tr>
                            <th><input type="checkbox" style="width: 17px;height: 17px;" class="checkSingle form-check-input" id="checkedAll"></th>
                            <th>#SL</th>
                            <th>DATE</th>
                            <th>SR</th>
                            <th>DELIVERY MAN</th>
                            <th>INVOICE</th>
                            <th>ACTION</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                        @foreach($invoices as $key => $invoice)
                        <tr>
                            <td><input type="checkbox" class="checkSingle form-check-input" name="invoice[]" value="{{ $invoice->invoice }}"></td>
                            <td>{{ $key+1 }}</td>
                            <td>{{ date('d M Y',strtotime($invoice->posted_at)) }}</td>
                            <td>{{ $invoice['getSrInfo']['name'] }}</td>
                            <td>{{ $invoice['getDeliveryManInfo']['name'] }}</td>
                            <td>{{ $invoice->invoice }}</td>
                            <td><a href="{{ route('stock.return',$invoice->invoice) }}" class="btn btn-success" target="_new">RETURN PRODUCT</a></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-warning mt-2" id="return_all_product_together">RETURN PRODUCT ALL INVOICE TOGETHER</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
