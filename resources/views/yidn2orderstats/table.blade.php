<div class="table-responsive">
    <table class="table" id="yidn2orderstats-table">
        <thead>
            <tr>
                <th>order_id</th>
                <th>total_sales</th>

        <th>status</th>
        <th>name</th>

        <th>email</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($yidn2orderstats as $yidn2orderstats)
            <tr>
                <td>{{ $yidn2orderstats->order_id }}</td>
                <td>{{ $yidn2orderstats->total_sales }}</td>
            <td>{{ $yidn2orderstats->status }}</td>
            <td>{{ $yidn2orderstats->first_name }}{{ $yidn2orderstats->last_name }}</td>

            <td>{{ $yidn2orderstats->email }}</td>
                <td width="120">

                    <div class='btn-group'>
                        importar {{ $yidn2orderstats->order_id }}
                    </div>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
