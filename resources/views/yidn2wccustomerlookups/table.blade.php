<div class="table-responsive">
    <table class="table" id="yidn2wccustomerlookups-table">
        <thead>
            <tr>
                <th>User Id</th>
        <th>Username</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Date Last Active</th>
        <th>Date Registered</th>
        <th>Country</th>
        <th>Postcode</th>
        <th>City</th>
        <th>State</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($yidn2wccustomerlookups as $yidn2wccustomerlookup)
            <tr>
                <td>{{ $yidn2wccustomerlookup->user_id }}</td>
            <td>{{ $yidn2wccustomerlookup->username }}</td>
            <td>{{ $yidn2wccustomerlookup->first_name }}</td>
            <td>{{ $yidn2wccustomerlookup->last_name }}</td>
            <td>{{ $yidn2wccustomerlookup->email }}</td>
            <td>{{ $yidn2wccustomerlookup->date_last_active }}</td>
            <td>{{ $yidn2wccustomerlookup->date_registered }}</td>
            <td>{{ $yidn2wccustomerlookup->country }}</td>
            <td>{{ $yidn2wccustomerlookup->postcode }}</td>
            <td>{{ $yidn2wccustomerlookup->city }}</td>
            <td>{{ $yidn2wccustomerlookup->state }}</td>
                <td width="120">

                    <div class='btn-group'>
                    </div>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
