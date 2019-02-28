@extends('layouts.standard') 
@section('content')


<div class="container-fluid" style="background-color: white">
        @include('layouts.errors')

    <form method="POST" action="/nuovoprotocollo">
        {{ csrf_field() }}

        <div id="generalpopup"></div>


          
        <div class="row formrow">
            <div class="col">
                <input type="text" class="form-control" placeholder="Nome" name="nome"  value="{{old('nome')}}" maxlength="32" required>
            </div>

           


        <button type="submit"  class="btn btn-success">Aggiungi</button>

        {{--<button type="button" onclick="verificaPass()" class="btn btn-success">Aggiungi</button>--}}

    </form>
</div>
@endsection

<script>

</script>
