@extends('backend.layouts.master')

@section('header')
    <link href="https://cdn.jsdelivr.net/npm/jquery-toast-plugin@1.3.2/dist/jquery.toast.min.css" rel="stylesheet">
@endsection

@section('dashboard_content')
    <div class="container-fluid" id="viewBlock">
        <div class="row">
            <div class="col-md-6 text-left">
                <h1 class="h5 mb-2 text-gray-800">All comments</h1>
            </div>
            <div class="col-md-6 text-right mb-2">
                {{--                <a href="{{route('admin_comment')}}" class="btn btn-primary">All Comments</a>--}}
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>User Name</th>
                            <th>Comments</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr v-for="(data, index) in datList" :key="index">
                            <th>@{{ index+1 }}</th>
{{--                            <th>@{{ data.visitor?.name || 'authorized user' }}</th>--}}
                            <th>@{{ data.visitor.name}}</th>
                            <th v-text="data.comment"></th>
                            <th>
                                <a @click="deleteComment(data)" class="btn btn-danger">Delete</a>
{{--                                <a onclick="return confirm(deleteComment(data))" class="btn btn-danger">Delete</a>--}}
                            </th>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('script')
    <script src="{{asset('backend/js/vue/vue.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        var app = new Vue({
            el: '#viewBlock',
            data: {
                message: 'Hello Vue!',
                dataList: {},

            },

            props : {

            },

            watch: {
                'formData.name': function (olVal, newVal) {
                    console.log('ftgyh');
                }
            },

            mounted() {
               this.getDataList()
            },

            created(){

            },

            methods: {
                getDataList(){
                    const _this = this;
                    axios.get(`${baseUrl}/api/comments_data`)
                        .then(function (response) {
                            console.log(response.data.result); // Log the data structure
                            _this.dataList = response.data.result;
                        })
                        .catch(function (error) {
                            console.error('Error fetching comments data:', error);
                        });
                },

                deleteComment: function(data) {
                    const _this = this;
                    axios.post(`${baseUrl}/api/comments_data/delete/`, { id: data.id })
                        .then(function (response) {
                            _this.getDataList()


                        })
                        .catch(function(error) {
                            console.error('Error deleting comment:', error);
                        });
                }
            }

        })
    </script>

@endsection
