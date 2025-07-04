@extends(admin_template_basic_theme('layouts.master'))

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">API History</h4>
                        <div class="table-responsive">
                            <table class="table" id="customer-table">
                                <thead>
                                <tr>
                                    <th>
                                        <div class="form-check form-check-muted m-0">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input">
                                            </label>
                                        </div>
                                    </th>
                                    <th> ID</th>
                                    <th> Data</th>
                                    <th> Time</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($histories as $history)
                                    @php
                                        if (! $history) {
                                            continue;
                                        }
                                        $history = json_decode($history, true);
                                    @endphp
                                    <tr>
                                        <td>
                                            <div class="form-check form-check-muted m-0">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input">
                                                </label>
                                            </div>
                                        </td>
                                        <td><span>{!! $loop->index !!}</span></td>
                                        <td>{{ json_encode($history['data']) }}</td>
                                        <td>{{ \Carbon\Carbon::parse($history['time'])->format('Y-m-d H:i:s') }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

