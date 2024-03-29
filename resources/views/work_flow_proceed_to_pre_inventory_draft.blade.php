<style>
    .table_suggested_so th:first-child,
    .table_suggested_so td:first-child {
        position: sticky;
        left: 0px;
        background-color: antiquewhite;
    }
</style>

<form id="work_flow_proceed_to_pre_inventory_draft_suggested_sales_order">
    @csrf
    <div class="table table-responsive">
          <table class="table table-sm table-bordered">
              <thead>
                  <tr>
                      <th colspan="3">Current Inventory</th>
                  </tr>
                  <tr>
                      <th>Desc</th>
                      <th>BO</th>
                      <th>Remaining</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach ($check_inventory_draft->inventory_draft_details as $data)
                      <tr>
                          <td>
                              {{ $data->inventory->description }} <br />
                              {{ $data->sku_type }}
                              <input type="hidden" name="current_inventory_id[]" value="{{ $data->inventory_id }}">
                              <input type="hidden" name="current_inventory_description[{{ $data->inventory_id }}]"
                                  value="{{ $data->inventory->description }}">
                              <input type="hidden" name="current_inventory_unit_price[{{ $data->inventory_id }}]"
                                  value="{{ $data->unit_price }}">
                          </td>
                          <td>
                              <input style="width:100px;" name="current_bo[{{ $data->inventory_id }}]" type="number"
                                  min="0" value="{{ $data->bo }}" required class="form-control">
  
                          </td>
                          <td>
                              <input style="width:100px;" name="current_remaining_inventory[{{ $data->inventory_id }}]"
                                  type="number" min="0" value="{{ $data->remaining_quantity }}" required class="form-control">
                              <input type="hidden" name="prev_delivered_inventory[{{ $data->inventory_id }}]"
                                  value="{{ $data->delivered_quantity }}">
                          </td>
                      </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
      <div class="table table-responsive">
          <table class="table table-sm table-bordered">
              <thead>
                  <tr>
                      <th colspan="3">New Sales Order</th>
                  </tr>
                  <tr>
                      <th>Desc</th>
                      <th>Qty</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach ($sales_order_inventory as $data)
                      <tr>
                          <td>
                              {{ $data->description }} <br />
                              {{ $data->sku_type }}
                              <input type="hidden" name="new_sales_order_inventory_id[]" value="{{ $data->id }}">
                              <input type="hidden" name="new_sales_order_inventory_description[{{ $data->id }}]"
                                  value="{{ $data->description }}">
                          </td>
                          <td><input style="width:100px;" name="new_sales_order_inventory_quantity[{{ $data->id }}]"
                                  type="number" min="0" value="0" required class="form-control"></td>
                      </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
    {{-- <input type="hidden" value="{{ $customer_id }}" name="customer_id">
    <input type="hidden" value="{{ $principal_id }}" name="principal_id">
    <input type="hidden" value="{{ $sku_type }}" name="sku_type">
    <input type="hidden" value="{{ $sales_register_id }}" name="sales_register_id"> --}}

    <input type="hidden" value="{{ $customer_id }}" name="customer_id">
    <input type="hidden" value="{{ $principal_id }}" name="principal_id">
    <input type="hidden" value="{{ $sku_type }}" name="sku_type">
    <input type="hidden" value="{{ $check_inventory_draft->date_delivered }}" name="date_delivered">
    <input type="hidden" value="{{ $check_inventory_draft->id }}" name="sales_register_id">
    <button type="submit" class="btn btn-block btn-info">PROCEED</button>
</form>

<script>
    $('.select2').select2();
    $("#work_flow_proceed_to_pre_inventory_draft_suggested_sales_order").on('submit', (function(e) {
        e.preventDefault();
        //$('.loading').show();
        $.ajax({
            url: "work_flow_suggested_sales_order",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                $('.loading').hide();
                $('#work_flow_suggested_sales_order_page').html(data);
            },
        });
    }));
</script>
