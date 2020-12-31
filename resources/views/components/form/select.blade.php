<div class="form-group">
    {{ Form::label($name, null, ['class' => 'control-label']) }}
    {{ Form::select($name, $values , $value ,array_merge(['class' => 'form-control'], $attributes)) }}
</div>



