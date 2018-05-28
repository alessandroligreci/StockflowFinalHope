@extends('layouts.app')
@section('content')
    <body>
        <script src="https://code.jquery.com/jquery.min.js"></script>
        {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"></script> --}}
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script type='text/javascript'>
        function UpdateWallet(){

            $.ajax({
                type: "GET",
                url: "https://stockflow.test/api/wallet",
                dataType: "json",

                success: function(result){
                    for (var i = 0; i < result.length; i++) {
                        console.log(result);
                    }
                }
            })
        }
        UpdateWallet();
        </script>
</body>
@endsection
