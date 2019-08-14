@extends('layouts.app')

@section('content')
    <div align="center">
        <!-- <div class="row"> -->
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <!-- <div class="panel-heading">CSV Import</div> -->

                    <H2>Data imported successfully</H2>
                    
                    <div>
                        <button type="button" class="btn btn-primary" onclick="window.location='{{ route("import") }}'">Home</button>
                    </div>
                </div>
            </div>
        <!-- </div> -->
    </div>
@endsection