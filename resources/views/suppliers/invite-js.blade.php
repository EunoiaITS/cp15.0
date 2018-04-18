@php $supplier = ''; @endphp
@foreach($suppliers as $s)
    @php $supplier .= '"'.$s->id.'",'; @endphp
    @endforeach
@php $supplier = rtrim($supplier, ','); @endphp
<script>
    var cat = '';
    $(document).ready(function(){
        $('.selectfilter').selectpicker({});
        var suppliers = '';
        var sups = '';
        var id = '';
        $('.select-suppliers').on('click', function(e){
            e.preventDefault();
            suppliers = '';
            id = $(this).attr('rel');
            $('.supplier-select').attr('rel', id);
            $('.supplier-select').prop('checked', false);
            var all_supp = [<?php if(isset($supplier)){echo $supplier; }?>];
            if($('#sup'+id).text() != ''){
                sups = $('#sup'+id).text().split(',');
                var difference = $(all_supp).not(sups).get();
                var html = '';
                difference.forEach(function(item){
                    var sup_id = $('#sup-id-'+item).text();
                    var sup_name = $('#sup-name-'+item).text();
                    var sup_category = $('#sup-category-'+item).text();
                    var cat_id = $('#cat-id-'+item).text();
                    html += '<tr id="sup-show-<?php if(isset($sup->id)){ echo $sup->id;}  ?>">'+
                        '<td>'+sup_name+'</td>'+
                        '<td><label><input rel="'+sup_id+'" class="supplier-select category'+cat_id+'" type="checkbox" name="supplier_id'+sup_id+'[]" value="'+sup_id+'"></label></td>'+
                        '</tr>';
                });
                $('#supplier-list').html(html);
            }else{
                var html = '';
                all_supp.forEach(function(item){
                    var sup_id = $('#sup-id-'+item).text();
                    var sup_name = $('#sup-name-'+item).text();
                    var cat_id = $('#cat-id-'+item).text();
                    html += '<tr>'+
                    '<td>'+sup_name+'</td>'+
                    '<td><label><input rel="'+sup_id+'" class="supplier-select category'+cat_id+'" type="checkbox" name="supplier_id'+sup_id+'[]" value="'+sup_id+'"></label></td>'+
                    '</tr>';
                });
                $('#supplier-list').html(html);
            }
        });
        $('#confirm-select').on('click', function(e){
            e.preventDefault();
            $(".supplier-select:checkbox:checked").each(function(){
                suppliers += $(this).val()+',';
            });
            $('#selected-suppliers'+id).val(suppliers);
            $('#action-add-'+id).val('add');
            suppliers = '';
            $('.'+cat).prop('checked', false);
        });
        $('#supp-cat').on('change',function (ev) {
            ev.preventDefault();
            cat = $(this).val();
            if(!$('.'+cat).is(':checked')){
                $('.'+cat).prop('checked', true);
                $("."+cat+":checkbox:checked").each(function() {
                });
                if(cat == 'del'){
                    $('.'+cat).prop('checked', false);
                    //alert("true");
                }
            }else{
                $('.'+cat).prop('checked', false);
            }
        });
    });

</script>