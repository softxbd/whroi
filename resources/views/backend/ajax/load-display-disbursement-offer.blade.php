<div class="mb-3 table_border_style">
    <table id="display_disbursement_offer_table">
        @foreach($offers as $key => $offer)
            <tr>
                <td><input class="form-check-input me-1 display_disbursement_add_to_cart" offer_id="{{ $offer->display_disbursement_offer_id }}" offer_name="{{ $offer->offer_name }}" index="{{ $key }}" type="checkbox">{{ $offer->offer_name }}</td>
                <td><input name="input_value" index_="{{ $key }}" offer_amount="{{ $offer->offer_amount }}" class="style_for_commission_amount me-1" type="text"></td>
            </tr>
        @endforeach
    </table>
</div>
