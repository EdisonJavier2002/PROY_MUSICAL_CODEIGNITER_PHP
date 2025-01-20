<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h3 class="text-center">Register / Update Album</h3>
            <hr>
            <form action="<?php echo isset($album) ? site_url('Albums/update') : site_url('Albums/save'); ?>" method="post" id="frm_album">
                <input type="hidden" name="id_alb" value="<?php echo isset($album) ? $album->id_alb : ''; ?>">

                <label for=""><b>Project:</b></label>
                <select name="id_proj" id="id_proj" class="form-control" required>
                    <option value="">-----Select Project-----</option>
                    <?php if ($projects): ?>
                        <?php foreach ($projects as $project): ?>
                            <option value="<?php echo $project->id_proj; ?>" <?php echo (isset($album) && $album->id_proj == $project->id_proj) ? 'selected' : ''; ?>>
                                <?php echo $project->name_proj; ?>
                            </option>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <option value="">No projects available</option>
                    <?php endif; ?>
                </select>
                <br>

                <label for=""><b>Album Name:</b></label>
                <input type="text" name="name_alb" id="name_alb" value="<?php echo isset($album) ? $album->name_alb : ''; ?>" placeholder="Enter album name" class="form-control" required maxlength="100">
                <br>

                <label for=""><b>Release Date:</b></label>
                <input type="date" name="release_date_alb" id="release_date_alb" value="<?php echo isset($album) ? $album->release_date_alb : ''; ?>" class="form-control" required>
                <br>

                <label for=""><b>Cover URL:</b></label>
                <input type="text" name="cover_alb" id="cover_alb" value="<?php echo isset($album) ? $album->cover_alb : ''; ?>" placeholder="Enter cover image URL" class="form-control">
                <br>

                <button class="btn btn-success" type="submit"><?php echo isset($album) ? 'Update' : 'Save'; ?></button>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <a href="<?php echo site_url('Albums/index'); ?>" class="btn btn-light">Cancel</a>
            </form>
        </div>

        <div class="col-md-8">
            <h3 class="text-center">Album List</h3>
            <br>
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Project ID</th>
                        <th class="text-center">Album Name</th>
                        <th class="text-center">Release Date</th>
                        <th class="text-center">Cover URL</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($albums): ?>
                        <?php foreach ($albums as $tempAlbum): ?>
                            <tr>
                                <td class="text-center"><?php echo $tempAlbum->id_alb; ?></td>
                                <td class="text-center"><?php echo $tempAlbum->id_proj; ?></td>
                                <td class="text-center"><?php echo $tempAlbum->name_alb; ?></td>
                                <td class="text-center"><?php echo $tempAlbum->release_date_alb; ?></td>
                                <td class="text-center"><?php echo $tempAlbum->cover_alb; ?></td>
                                <td class="text-center">
                                    <a href="<?php echo site_url('Albums/select/'.$tempAlbum->id_alb); ?>" class="btn btn-primary">Select</a>
                                    <a href="<?php echo site_url('Albums/delete/'.$tempAlbum->id_alb); ?>" class="btn btn-danger" onclick="return confirm('Are you sure?');">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center text-danger">No albums registered</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
