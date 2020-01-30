@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-center">{{ __('Import Employee Notification CSV File') }}</div>

                <div class="card-body">
                <form method="POST" enctype="multipart/form-data" action="{{url('/upload_note')}}">
                    @csrf
                    <div class="form-group">
                            <table class="table">
                             <tr>
                              <td width="40%" align="right"><label>Select File for Upload</label></td>
                              <td width="30">
                               <input type="file" name="upload_file" />
                              </td>
                              <td width="30%" align="left">
                               <input type="submit" name="upload" class="btn btn-primary" value="Upload">
                              </td>
                             </tr>
                
                            </table>
                           </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
