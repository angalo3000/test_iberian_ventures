@extends('layouts.app')

@section('content')
<div class="container" id="crudApp">
    
    <div v-for="user in companies">
        @{{ user.name }}
    </div>
    <div class="row justify-content-center">
        <table class="table table-bordered table_striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                </tr>
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
