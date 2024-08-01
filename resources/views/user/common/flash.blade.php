@if (count($errors) > 0)
<div class="alert alert-danger alertdisapper" style="background-color: #000000; border-color: #badbcc40;">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@if(session()->has('success'))
<div class="alert alert-success alertdisapper" style="background-color: #000000; border-color: #badbcc40;">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    {{ session()->get('success') }}
</div>
@endif
@if(session()->has('error'))
<div class="alert alert-danger alertdisapper" style="background-color: #000000; border-color: #badbcc40;">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    {{ session()->get('error') }}
</div>
@endif

<div id="error-message" style="display:none" class="alert alert-danger"
    style="background-color: #000000; border-color: #badbcc40;" data-dismiss="alert" aria-label="close">

    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
</div>
<div id="success-message" style="display:none" class="alert alert-success"
    style="background-color: #000000; border-color: #badbcc40;" data-dismiss="alert" aria-label="close">

    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
</div>
