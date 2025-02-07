<!doctype html>
<html lang="en">
@include('partials.head', ['pageTitle'=>'HomePage', 'metaTitle'=>'HomePage'])

<body>
@include('partials.navbar')


@if(session('success'))
<div class="alert alert-success">
    {{session('success')}}
    @else
        {{session('session_destroy')}}
    @endif
</div>
<div class="font-sans py-1">
    <div class=" mx-auto">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/24/CoA_mil_ITA_airmobile_bde_Friuli.png/190px-CoA_mil_ITA_airmobile_bde_Friuli.png" alt="" width="50" height="55">
    </div>

    <p>BRIGATA AEROMOBILE FRIULI</p>
    <p>Gestione Contabile Amminstrativa</p>
</div>
</body>
</html>
