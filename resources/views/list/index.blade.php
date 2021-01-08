@extends('layouts.app')

@section('content')
<div class="container" id="crudApp">
    <div class="col-md-2">
        <a href="/list/print">
            <button type="submit" class="form-control btn btn-success">
                {{ __('Excel') }}
            </button>
        </a>
    </div>
    <div class="row justify-content-center">
        <h3>List of all Sectors recorded</h3>
        <br>
        <table class="table table-bordered table_striped table-hover">
            <thead>
                <tr>
                    <th>Sector</th>
                    <th>Email</th>
                    <th>Revenue</th>
                    <th>Net Debt</th>
                    <th>Fixed Assets</th>
                    <th>Selling</th>

                    <th>EBITDA/Rev</th>
                    <th>Net Margin</th>
                    <th>Deuda/EBITDA</th>
                    <th>Assets to revenue Ratio</th>
                    <th>Total Score</th>
                    <th>Decision</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($records as $record)
                    <tr>
                        <td>{{ $record->sector }}</td>
                        <td>{{ $record->email }}</td>
                        <td>{{ number_format($record->revenue, 2, ".", ",") }}</td>
                        <td>{{ number_format($record->net_debt, 2, ".", ",") }}</td>
                        <td>{{ number_format($record->total_fixed_assets, 2, ".", ",") }}</td>
                        <td>{{ $record->sell_company }}</td>

                        <td>{{ $record->ebitda_rev }}</td>
                        <td>{{ $record->net_margin }}</td>
                        <td>{{ $record->deuda_ebitda }}</td>
                        <td>{{ $record->asset_to_revenue }}</td>
                        <td>{{ $record->total_score }}</td>
                        <td>{{ $record->decision }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

{{-- <script>

    var application = new Vue({
        el:'#crudApp',
        data:{
            allData:'',
        },
        methods: {
            fetchAllData:function(){
                axios.post('action.php', {
                    action:'fetchall'
                }).then(function(response){
                    application.allData = response.data;
                });
            }
        },
        created:function() {
            
        },
    });

</script> --}}
@endsection
