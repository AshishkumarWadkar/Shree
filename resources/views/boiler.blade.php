@extends('app')

@section('content')
    <!--**********************************
                Content body start
            ***********************************-->
    <div class="content-body">

        <div class="row page-titles mx-0">
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->

        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-validation">
                                <form class="form-valide" action="{{route('boiler.add')}}" method="post" enctype="multipart/form-data">
                                   @csrf
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="date">Date<span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="date" class="form-control" id="date" name="date"
                                                placeholder="Select The Date">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="boiler">Boiler<span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">

                                            <select class="form-control" id="boiler" name="boiler">
                                                <option value="">Please select</option>

                                                @foreach ($boiler as $b)
                                                <option value="{{ $b->id }}">{{ $b->name }}</option>
                                                @endforeach


                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="origin">Origin<span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <select class="form-control" id="origin" name="origin">
                                                <option value="">Please select</option>
                                                @foreach ($origin as $o)
                                                <option value="{{ $o->id }}">{{ $o->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="ready">Ready <span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="number" class="form-control" name="ready"
                                                placeholder="Enter the Redy cushow nuts">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="rejected">Rejected <span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="number" class="form-control" name="rejected"
                                                placeholder="Enter the rejected cushow nuts">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="uncut">Uncut <span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="number" class="form-control" name="uncut"
                                                placeholder="Enter the uncut cushow nuts">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="remain">Remain <span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="number" class="form-control" id="remain" name="remain"
                                                placeholder="Enter The reamin Quintity">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-8 ml-auto">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Data Table</h4>
                            <div class="table-responsive">
                                <table id="example" class=" table table-striped table-bordered ">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Boiler</th>
                                            <th>Origin</th>
                                            <th>Ready</th>
                                            <th>Rejected</th>
                                            <th>Uncut</th>
                                            <th>Remain</th>
                                        </tr>
                                    </thead>
                                    <tbody> </tbody>

                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #/ container -->
    </div>
    <!--**********************************
                Content body end
             ***********************************-->

    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "lengthMenu": [[10, 25, 50,100,500,1000, -1], [10, 25, 50,100,500,1000 ,"All"]],

                dom: "<'row'<'col-sm-4'l><'col-sm-4'B><'col-sm-4'f>>" +
      "<'row'<'col-sm-12'tr>>" +
      "<'row'<'col-sm-4'i><'col-sm-8'p>>",
                ajax: '/view',
                columns: [{

                        data: 'date'
                    },
                    {
                        data: 'name'
                    },
                    {
                        data: 'origin'
                    },
                    {
                        data: 'ready'
                    },
                    {
                        data: 'reject'
                    },
                    {
                        data: 'uncut'
                    },
                    {
                        data: 'remain'
                    },
                ],

            });
        });

    </script>
@endsection
