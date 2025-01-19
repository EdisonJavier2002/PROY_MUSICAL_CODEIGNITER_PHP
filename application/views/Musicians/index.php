<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h3 class="text-center">Register / Update Musician</h3>
            <hr>
            <form action="<?php echo isset($musician) ? site_url('Musicians/update') : site_url('Musicians/save'); ?>" method="post" id="frm_musician">
                <input type="hidden" name="id_mus" value="<?php echo isset($musician) ? $musician->id_mus : ''; ?>">
                <label for=""><b>User ID:</b></label>
                <select name="id_us" id="id_us" class="form-control" required>
                    <option value="">-----Select User-----</option> 
                    <?php if ($users): ?>
                        <?php foreach ($users as $user): ?>
                            <option value="<?php echo $user->id_us; ?>" <?php echo (isset($musician) && $musician->id_us == $user->id_us) ? 'selected' : ''; ?>>
                                <?php echo $user->first_name_us . ' ' . $user->last_name_us; ?>
                            </option>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <option value="">No users available</option>
                    <?php endif; ?>
                </select>
                <br>
                <label for=""><b>Stage Name:</b></label>
                <input type="text" name="stage_name_mus" id="stage_name_mus" value="<?php echo isset($musician) ? $musician->stage_name_mus : ''; ?>" placeholder="Enter stage name" class="form-control" required maxlength="100">
                <br>
                <label for=""><b>Biography:</b></label>
                <textarea name="biography_mus" id="biography_mus" placeholder="Enter biography" class="form-control" required><?php echo isset($musician) ? $musician->biography_mus : ''; ?></textarea>
                <br>
                <button class="btn btn-success" type="submit"><?php echo isset($musician) ? 'Update' : 'Save'; ?></button>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <a href="<?php echo site_url('Musicians/index'); ?>" class="btn btn-light">Cancel</a>
            </form>
        </div>
        <div class="col-md-8">
            <h3 class="text-center">Musician List</h3>
            <br>
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">User ID</th>
                        <th class="text-center">Stage Name</th>
                        <th class="text-center">Biography</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($musicians): ?>
                        <?php foreach ($musicians as $tempMusician): ?>
                            <tr>
                                <td class="text-center"><?php echo $tempMusician->id_mus; ?></td>
                                <td class="text-center"><?php echo $tempMusician->id_us; ?></td>
                                <td class="text-center"><?php echo $tempMusician->stage_name_mus; ?></td>
                                <td class="text-center"><?php echo substr($tempMusician->biography_mus, 0, 50); ?>...</td>
                                <td class="text-center">
                                    <a href="<?php echo site_url('Musicians/select/'.$tempMusician->id_mus); ?>" class="btn btn-primary">Select</a>
                                    <a href="<?php echo site_url('Musicians/delete/'.$tempMusician->id_mus); ?>" class="btn btn-danger" onclick="return confirm('Are you sure?');">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center text-danger">No musicians registered</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
