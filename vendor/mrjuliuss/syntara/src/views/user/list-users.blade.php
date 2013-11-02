<div class="row upper-menu">
    {{ $datas['users']->links(); }}
    
    <div style="float:right;">
        @if($currentUser->hasAccess('delete-user'))
        <a id="delete-item" class="btn btn-danger">Delete</a>
        @endif

        @if($currentUser->hasAccess('create-user'))
        <a class="btn btn-info" href="user/new">New User</a>
        @endif
    </div>
</div>
<table class="table table-striped table-bordered table-condensed">
<thead>
    <tr>
        @if($currentUser->hasAccess('delete-user'))
        <th class="col-lg-1" style="text-align: center;"><input type="checkbox" class="check-all"></th>
        @endif
        <th class="col-lg-1 hidden-xs" style="text-align: center;">Id</th>
        <th class="col-lg-1">Username</th>
        <th class="col-lg-2 visible-lg visible-xs">Email</th>
        <th class="col-lg-2 hidden-xs">Groups</th>
        <th class="col-lg-2 hidden-xs">Permissions</th>
        <th class="col-lg-1 visible-lg">Last Name</th>
        <th class="col-lg-1 visible-lg">First Name</th>
        <th class="col-lg-1 hidden-xs">Activated</th>
        @if($currentUser->hasAccess('update-user-info'))
        <th class="col-lg-1 hidden-xs">Banned</th>
       
        <th class="col-lg-1" style="text-align: center;">Show</th>
        @endif
    </tr>
</thead>
<tbody>
    @foreach ($datas['users'] as $user)
    <?php
    $throttle = $throttle = Sentry::findThrottlerByUserId($user->getId());
    ?>
    <tr>
        @if($currentUser->hasAccess('delete-user'))
        <td style="text-align: center;">
            <input type="checkbox" data-user-id="{{ $user->getId(); }}">
        </td>
        @endif
        <td class="hidden-xs" style="text-align: center;">{{ $user->getId() }}</td>
        <td >&nbsp;{{ $user->username }}</td>
        <td class="visible-xs visible-lg">&nbsp;{{ $user->getLogin() }}</td>
        <td class="hidden-xs">
        @foreach($user->getGroups()->toArray() as $key => $group)
            {{ $group['name'] }},
        @endforeach
        </td>
        <td class="hidden-xs">{{ json_encode($user->getPermissions()) }}</td>
        <td class="visible-lg">&nbsp;{{ $user->last_name }}</td>
        <td class="visible-lg">&nbsp;{{ $user->first_name }}</td>
        <td class="hidden-xs">{{ $user->activated ? 'Yes' : '<a class="activate-user" href="#" data-toggle="tooltip" title="Activate this user">No</a>'}}</td>
        @if($currentUser->hasAccess('update-user-info'))
        <td class="hidden-xs">{{ $throttle->isBanned() ? 'Yes' : 'No'}}</td>        
        <td style="text-align: center;">&nbsp;<a href="user/{{ $user->getId() }}">show</a></td>
        @endif
    </tr>
    @endforeach
</tbody>
</table>