@extends('main') @section('content')
<div class="content-wrapper">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-md-12 col-sm-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('masterdata.otoritasUpdate') }}" method="POST">
                        @csrf
                        <div class="table-responsive overflow-hidden">
                        <div class="row align-items-center">
                            <div class="ml-2 col-lg-10 col-md-12 col-sm-12 align-items-center">
                                <h2>Master Data <b>Otoritas</b></h2>
                            </div>
                            <div class="mb-2 col-lg-2 col-md-3 col-sm-6">
                                <button class="btn btn-success btn-block col-12" type="submit" style="margin-top: 10px">
                                    <i class="fa fa-filter"></i> Update
                                </button>
                            </div>
                        </div>
                        <table class="tableFixHead pb-2" width="100%">
                            <thead >
                                <tr>
                                    <th>User / Menu</th>
                                    @foreach ($menu as $data_menu)
                                        <th style="overflow: hidden; max-width:7rem">{{$data_menu->sub_menu}}</th>
                                    @endforeach
                                </tr>
                            </thead>                   
                                <tbody>
                                    @foreach ($user as $data_user)
                                    <tr>
                                        <td>{{ $data_user->name }}</td>
                                        @foreach ($menu as $data_menu)
                                        {{$flag = false;}}
                                            @foreach ($menus_det as $checked)
                                                @if ($data_user->id == $checked->id_user && $data_menu->id == $checked->id_menu)
                                                    <div hidden>{{$flag = true;}}</div>
                                                @endif
                                            @endforeach
                                            @if ($data_user->role == 'Administrator')
                                                <td><input type="checkbox" class="form-check-input checkbox-cstm" checked></td>
                                            @elseif ($flag)
                                                <td><input type="checkbox" class="form-check-input checkbox-cstm" name="{{$data_user->id}}-{{$data_menu->id}}" checked></td>
                                            @else
                                                <td><input type="checkbox" class="form-check-input checkbox-cstm" name="{{$data_user->id}}-{{$data_menu->id}}"></td>
                                            @endif
                                        @endforeach
                                    </tr>
                                    @endforeach
                                </tbody>
                        </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection