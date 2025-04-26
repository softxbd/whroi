<div class="mb-3 table_border_style">
    <table id="commission_offer_table">
        @foreach($offers as $key => $offer)
        <tr>
            <td><input class="form-check-input me-1 commission_add_to_cart" offer_type="@if($offer->offer_type == "1") Product Wise @else Percentage Wise @endif" offer_id="{{ $offer->commission_offer_id }}" offer_name="{{ $offer->offer_name }}" index="{{ $key }}" type="checkbox">{{ $offer->offer_name }} - {{ $offer->product_name }}</td>
            <td><span class="offer_type">@if($offer->offer_type == "1") Product Wise @else Percentage Wise @endif</span></td>
            <td><input name="input_value" index_="{{ $key }}" offer_type_id="{{ $offer->offer_type }}" offer_value="{{ $offer->offer_value }}" class="style_for_commission_amount me-1" type="text"></td>
            <td><input name="offer_value" class="style_for_commission_amount me-1" readonly value="{{ $offer->offer_value }}" type="text"></td>
            <td><input name="commission_value" class="style_for_commission_amount me-1" type="text"></td>
        </tr>
        @endforeach
    </table>
</div>
