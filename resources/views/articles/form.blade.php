@if(session()->has('success'))
    <x-alerts.success message="{{ session()->get('success') }}"/>
@elseif(session()->has('error'))
    <x-alerts.error message="{{ session()->get('error') }}"/>
@endif

@include('articles.form.wrap')
@include('articles.form.delete')
