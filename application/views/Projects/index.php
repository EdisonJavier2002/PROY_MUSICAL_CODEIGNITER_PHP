<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h3 class="text-center">Register / Update Project</h3>
            <hr>
            <form action="<?php echo isset($project) ? site_url('Projects/update') : site_url('Projects/save'); ?>" method="post" id="frm_project">
                <input type="hidden" name="id_proj" value="<?php echo isset($project) ? $project->id_proj : ''; ?>">

                <label for=""><b>Musician:</b></label>
                <select name="id_mus" id="id_mus" class="form-control" required>
                    <option value="">-----Select Musician-----</option>
                    <?php if ($musicians): ?>
                        <?php foreach ($musicians as $musician): ?>
                            <option value="<?php echo $musician->id_mus; ?>" <?php echo (isset($project) && $project->id_mus == $musician->id_mus) ? 'selected' : ''; ?>>
                                <?php echo $musician->stage_name_mus; ?>
                            </option>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <option value="">No musicians available</option>
                    <?php endif; ?>
                </select>
                <br>

                <label for=""><b>Project Name:</b></label>
                <input type="text" name="name_proj" id="name_proj" value="<?php echo isset($project) ? $project->name_proj : ''; ?>" placeholder="Enter project name" class="form-control" required maxlength="100">
                <br>

                <label for=""><b>Description:</b></label>
                <textarea name="description_proj" id="description_proj" placeholder="Enter project description" class="form-control" required><?php echo isset($project) ? $project->description_proj : ''; ?></textarea>
                <br>

                <label for=""><b>Project Type:</b></label>
                <select name="type_proj" id="type_proj" class="form-control" required>
                    <option value="">-----Select Project-----</option> 
                    <option value="Album" <?php echo (isset($project) && $project->type_proj == 'Album') ? 'selected' : ''; ?>>Album</option>
                    <option value="Concert" <?php echo (isset($project) && $project->type_proj == 'Concert') ? 'selected' : ''; ?>>Concert</option>
                    <option value="Recording" <?php echo (isset($project) && $project->type_proj == 'Recording') ? 'selected' : ''; ?>>Recording</option>
                </select>
                <br>

                <button class="btn btn-success" type="submit"><?php echo isset($project) ? 'Update' : 'Save'; ?></button>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <a href="<?php echo site_url('Projects/index'); ?>" class="btn btn-light">Cancel</a>
            </form>
        </div>

        <div class="col-md-8">
            <h3 class="text-center">Project List</h3>
            <br>
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Musician ID</th>
                        <th class="text-center">Project Name</th>
                        <th class="text-center">Project Type</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($projects): ?>
                        <?php foreach ($projects as $tempProject): ?>
                            <tr>
                                <td class="text-center"><?php echo $tempProject->id_proj; ?></td>
                                <td class="text-center"><?php echo $tempProject->id_mus; ?></td>
                                <td class="text-center"><?php echo $tempProject->name_proj; ?></td>
                                <td class="text-center"><?php echo $tempProject->type_proj; ?></td>
                                <td class="text-center">
                                    <a href="<?php echo site_url('Projects/select/'.$tempProject->id_proj); ?>" class="btn btn-primary">Select</a>
                                    <a href="<?php echo site_url('Projects/delete/'.$tempProject->id_proj); ?>" class="btn btn-danger" onclick="return confirm('Are you sure?');">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center text-danger">No projects registered</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
