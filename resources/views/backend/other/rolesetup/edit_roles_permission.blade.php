<x-main-layout>
    @section('title', breadcrumb())

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <style type="text/css">
        .form-check-label {
            text-transform: capitalize;
        }
    </style>

    <div class="page-content">


        <div class="row profile-body">
            <!-- left wrapper start -->

            <!-- left wrapper end -->
            <!-- middle wrapper start -->
            <div class="col-md-12 col-xl-12 middle-wrapper">
                <div class="row">
                    <div class="card">
                        <div class="card-body">

                            <h6 class="card-title fw-bold">Edit Roles in Permission </h6>

                            {!! Form::open([
                                'method' => 'post',
                                'route' => ['admin.roles.update', $role->id],
                                'class' => 'forms-sample',
                            ]) !!}

                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1" class="form-label">Roles Name </label>
                                <h3>{{ $role->name }}</h3>

                            </div>


                            <div class="form-check mb-2">
                                {!! Form::checkbox('all_permission', '', false, ['class' => 'form-check-input', 'id' => 'checkDefaultmain']) !!}

                                {!! Form::label('permission_all', 'Permission All', ['class' => 'form-check-label', 'id' => 'checkDefault']) !!}


                            </div>

                            <hr>

                            @foreach ($permission_groups as $group)
                                <div class="row">
                                    <div class="col-3">

                                        @php
                                            $permissions = App\Models\User::getpermissionByGroupName($group->group_name);
                                        @endphp

                                        <div class="form-check mb-2">
                                            {!! Form::checkbox('permissions', '', App\Models\User::roleHasPermissions($role, $permissions) ? true : false, [
                                                'class' => 'form-check-input',
                                                'id' => 'checkDefaultmain',
                                            ]) !!}

                                            {!! Form::label('name', $group->group_name, ['class' => 'form-check-label', 'id' => 'checkDefault']) !!}

                                        </div>


                                    </div>


                                    <div class="col-9">



                                        @foreach ($permissions as $permission)
                                            <div class="form-check mb-2">
                                                {!! Form::checkbox('permission[]', $permission->id, $role->hasPermissionTo($permission->name) ? true : false, [
                                                    'class' => 'form-check-input',
                                                    'id' => 'checkDefault' . $permission->id,
                                                ]) !!}
                                                {!! Form::label('name', $permission->name, [
                                                    'class' => 'form-check-label',
                                                    'for' => 'checkDefault' . $permission->id,
                                                ]) !!}


                                            </div>
                                        @endforeach
                                        <br>
                                    </div>

                                </div> <!-- // End Row  -->
                            @endforeach






                            {!! Form::submit('Submit', ['class' => 'btn btn-outline-primary btn-icon-text mb-2 mb-md-0']) !!}
                            {{ Form::close() }}

                        </div>
                    </div>




                </div>
            </div>
            <!-- middle wrapper end -->
            <!-- right wrapper start -->

            <!-- right wrapper end -->
        </div>

    </div>

    <script type="text/javascript">
        $('#checkDefaultmain').click(function() {
            if ($(this).is(':checked')) {
                $('input[ type= checkbox]').prop('checked', true);
            } else {
                $('input[ type= checkbox]').prop('checked', false);
            }
        });
    </script>
</x-main-layout>
