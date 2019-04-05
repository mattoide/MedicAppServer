<div style="width: 90%">
    <table class="table table-bordered">
        <tbody id="tablestoriaclinica">
        <tr>
            <td class="datetd">
                <input class="form-control" type="date" value="<?php echo date('Y-m-d'); ?>" name="datastoriaclinica" value="{{old('datastoriaclinica')}}">
            </td>

            <td>
                <textarea class="form-control"  rows="3"
                          name="storiaclinica"  value="{{old('storiaclinica')}}"></textarea>
            </td>
        </tr>
        </tbody>
    </table>
</div>