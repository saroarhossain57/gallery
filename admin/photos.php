<?php include("includes/header.php"); ?>
    <?php if(!$session->is_signed_in()){redirect('login.php');} ?>
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->

            <?php include('includes/top_nav.php'); ?>


            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php include('includes/sidebar_nav.php'); ?>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Photos Page
                            <small></small>
                        </h1>
                        
                        <div class="col-md-12">
                            <?php 
                            $photos = Photo::find_all();

                            ?>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Photo</th>
                                        <th>Id</th>
                                        <th>Filename</th>
                                        <th>Title</th>
                                        <th>Size</th>
                                        <th>Comments</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($photos as $photo) : ?>
                                    <tr>
                                        <td>
                                            <img class="admin-photo-list" src="<?php echo $photo->photo_path(); ?>" alt="">
                                            <div class="ation_links">
                                                <a href="../photo.php?id=<?php echo $photo->id; ?>">View</a>
                                                <a href="edit_photo.php?id=<?php echo $photo->id; ?>">Update</a>
                                                <a href="delete_photo.php?id=<?php echo $photo->id; ?>">Delete</a>
                                            </div>
                                        </td>
                                        <td><?php echo $photo->id; ?></td>
                                        <td><?php echo $photo->filename; ?></td>
                                        <td><?php echo $photo->title; ?></td>
                                        <td><?php echo $photo->size; ?></td>
                                        <td><?php 
                                            $comments = Comment::find_the_comments($photo->id);
                                            echo '<a href="comment_photo.php?id='. $photo->id .'">'. count($comments) .'</a>';
                                        ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>