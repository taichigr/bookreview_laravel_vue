@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <search
                endpoint="{{ route('searchstore') }}"
                redirect-endpoint="{{ route('home') }}"
            ></search>
        </div>
    </div>
@endsection

<script>
    import Search from "../../js/components/Search";
    export default {
        components: {Search}
    }
</script>
