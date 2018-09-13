<script>
    $(document).ready(function(){
        $('#submit').on('click',function (e) {
            e.preventDefault();
            /*var up = $('.unit-price').val();
            if(up === ''){
                $('.unit-price').after('<div style="color:red;">This field is required</div>');
                return false;
            }*/
            $('#submit-qr').submit();
        });
        var count = 0;
        $('#add-item-create').on('click', function(e){
            e.preventDefault();
            count++;
            var html_create ='<tr>' +
                '<td><input type="text" name="origin'+count+'" class="form-control from-btn-supplier from-qr"></td>' +
                '<td><input type="text" name="genuine'+count+'" class="form-control from-btn-supplier from-qr"></td>' +
                '<td><input type="text" name="oem'+count+'" class="form-control from-btn-supplier from-qr"></td>' +
                '<td><input type="text" name="brand'+count+'" class="form-control from-btn-supplier from-qr"></td>' +
                '<td><input type="text" name="delivery_date'+count+'" class="form-control from-qr from-supplier datepicker-f"></td>' +
                '<td><input type="text" name="unit_price'+count+'" class="form-control from-btn-supplier from-qr unit-price" required></td>' +
                '<td><input type="text" name="comment'+count+'" class="form-control from-qr from-supplier"></td>' +
                '<td>' +
                '<div class="file btn btn-sm btn-primary btn-supplier">' +
                '<div class="upload-icon"><i class="fa fa-cloud-upload" aria-hidden="true"></i></div><span>Upload</span>' +
                '<input type="file" name="attachment'+count+'" class="input-upload">' +
                '</div>' +
                '</td>' +
                '</tr>';
            $('#add-item-table-item').append(html_create);
            $('#total').val(count);
            $(document).on("focus", ".datepicker-f", function(){
                $('.datepicker-f').datetimepicker({
                    format: "YYYY-MM-DD",
                    icons: {
                        up: 'fa fa-angle-up',
                        down: 'fa fa-angle-down',
                        previous: 'fa fa-angle-left',
                        next: 'fa fa-angle-right',
                    }
                });
            });
        });
    });
</script>