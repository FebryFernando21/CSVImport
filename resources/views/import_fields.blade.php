@extends('layouts.app')

@section('content')
    <div align="center">
        <!-- <div class="row"> -->
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <h1>Data Checking</h1>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('import_process') }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="csv_data_file_id" value="{{ $csv_data_file->id }}" />

                            <table class="table">
                                @if (isset($csv_header_fields))
                                <tr>
                                    @foreach ($csv_header_fields as $csv_header_field)
                                        <th>{{ $csv_header_field }}</th>
                                    @endforeach
                                </tr>
                                @endif
                                @foreach ($csv_data as $row)
                                    <tr>
                                    @foreach ($row as $key => $value)
                                        <td>{{ $value }}</td>
                                    @endforeach
                                    </tr>
                                @endforeach
                            </table>

                            <button type="submit" class="btn btn-primary">
                                Import Data to Database
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        <!-- </div> -->
    </div>
@endsection

    