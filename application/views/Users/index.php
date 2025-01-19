<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h3 class="text-center">Register / Update User</h3>
            <hr>
            <form action="<?php echo isset($user) ? site_url('Users/update') : site_url('Users/save'); ?>" method="post" id="frm_user">
                <input type="hidden" name="id_us" value="<?php echo isset($user) ? $user->id_us : ''; ?>">
                <label for=""><b>First Name:</b></label>
                <input type="text" name="first_name_us" id="first_name_us" value="<?php echo isset($user) ? $user->first_name_us : ''; ?>" placeholder="Enter first name" class="form-control" required maxlength="40">
                <br>
                <label for=""><b>Last Name:</b></label>
                <input type="text" name="last_name_us" id="last_name_us" value="<?php echo isset($user) ? $user->last_name_us : ''; ?>" placeholder="Enter last name" class="form-control" required maxlength="40">
                <br>
                <label for=""><b>Email:</b></label>
                <input type="email" name="email_us" id="email_us" value="<?php echo isset($user) ? $user->email_us : ''; ?>" placeholder="Enter email" class="form-control" required maxlength="50">
                <br>
                <label for=""><b>Password:</b></label>
                <input type="password" name="password_us" id="password_us" value="<?php echo isset($user) ? $user->password_us : ''; ?>" placeholder="Enter password" class="form-control" required minlength="6" maxlength="60" title="Password should be between 8 and 20 characters long.">
                <br>
                <label for=""><b>Role:</b></label>
                <select name="role_us" id="role_us" class="form-control" required>
                    <option value="">-----Select Role-----</option> 
                    <option value="Listener" <?php echo (isset($user) && $user->role_us == 'Listener') ? 'selected' : ''; ?>>Listener</option>
                    <option value="Musician" <?php echo (isset($user) && $user->role_us == 'Musician') ? 'selected' : ''; ?>>Musician</option>
                </select>
                <br>
                <button class="btn btn-success" type="submit"><?php echo isset($user) ? 'Update' : 'Save'; ?></button>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <a href="<?php echo site_url('Users/index'); ?>" class="btn btn-light">Cancel</a>
            </form>
        </div>
        <div class="col-md-8">
            <h3 class="text-center">User List</h3>
            <br>
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">First Name</th>
                        <th class="text-center">Last Name</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Password</th>
                        <th class="text-center">Role</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($users): ?>
                        <?php foreach ($users as $tempUser): ?>
                            <tr>
                                <td class="text-center"><?php echo $tempUser->id_us; ?></td>
                                <td class="text-center"><?php echo $tempUser->first_name_us; ?></td>
                                <td class="text-center"><?php echo $tempUser->last_name_us; ?></td>
                                <td class="text-center"><?php echo $tempUser->email_us; ?></td>
                                <td class="text-center"><?php echo $tempUser->password_us; ?></td>
                                <td class="text-center"><?php echo $tempUser->role_us; ?></td>
                                <td class="text-center">
                                    <a href="<?php echo site_url('Users/select/'.$tempUser->id_us); ?>" class="btn btn-primary">Select</a>
                                    <a href="<?php echo site_url('Users/delete/'.$tempUser->id_us); ?>" class="btn btn-danger" onclick="return confirm('Are you sure?');">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center text-danger">No users registered</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

