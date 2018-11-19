@if (session()->has('error'))
<div class="alert alert-success" style="color:red;">
        {!! session()->get('error') !!}
    </div>
    
@endif