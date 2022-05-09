<div class="field auto" data-grid-filter-field="{{$id}}" data-grid-filter-field-column="{{$column}}">
    <div class="name">{{$label}}</div>
    <div class="input">
        <select class="form" id="{{$id}}Select">
            <option value="" @if(null===$defaultValue) selected @endif>{{L('All')}}</option>
            @foreach($field->options() as $k=>$v)
                <option value="{{$k}}" @if(null!==$defaultValue&&$defaultValue==$k) selected @endif>{{$v}}</option>
            @endforeach
        </select>
    </div>
</div>
<script>
    (function () {
        var $field = $('[data-grid-filter-field={{$id}}]');
        $field.data('get', function () {
            return {
                '{{$column}}': {
                    eq: $('#{{$id}}Select').val()
                }
            };
        });
        $field.data('reset', function () {
            $('#{{$id}}Select').val('');
        });
        $field.data('init', function (data) {
            for (var i = 0; i < data.length; i++) {
                for (var k in data[i]) {
                    if (k === '{{$column}}' && ('eq' in data[i][k])) {
                        $('#{{$id}}Select').val(data[i][k].eq);
                    }
                }
            }
        });
    })();
</script>
