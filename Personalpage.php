<?php include "views/inc/header.php"; 
   

?>

<?php if ($_SESSION['user_name'] == "admin"): ?>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap');

        :root {
            --green: #27ae60;
            --black: #333;
            --white: #fff;
            --bg-color: #eee;
            --box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .1);
            --border: .1rem solid var(--black);
        }

        * {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            outline: none;
            border: none;
            text-decoration: none;
            text-transform: capitalize;
        }

        html {
            font-size: 62.5%;
            overflow-x: hidden;
        }

        .btn {
            display: block;
            width: 100%;
            cursor: pointer;
            border-radius: .5rem;
            margin-top: 1rem;
            font-size: 1.7rem;
            padding: 1rem 3rem;
            background: var(--green);
            color: var(--white);
            text-align: center;
        }

        .btn:hover {
            background: var(--black);
        }

        .message {
            display: block;
            background: var(--bg-color);
            padding: 1.5rem 1rem;
            font-size: 2rem;
            color: var(--black);
            margin-bottom: 2rem;
            text-align: center;
        }

        .container {
            max-width: 1200px;
            padding: 2rem;
            margin: 0 auto;
        }

        .admin-product-form-container.centered {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;

        }

        .admin-product-form-container form {
            max-width: 50rem;
            margin: 0 auto;
            padding: 2rem;
            border-radius: .5rem;
            background: var(--bg-color);
        }

        .admin-product-form-container form h3 {
            text-transform: uppercase;
            color: var(--black);
            margin-bottom: 1rem;
            text-align: center;
            font-size: 2.5rem;
        }

        .admin-product-form-container form .box {
            width: 100%;
            border-radius: .5rem;
            padding: 1.2rem 1.5rem;
            font-size: 1.7rem;
            margin: 1rem 0;
            background: var(--white);
            text-transform: none;
        }

        .product-display {
            margin: 2rem 0;
        }

        .product-display .product-display-table {
            width: 100%;
            text-align: center;
        }

        .product-display .product-display-table thead {
            background: var(--bg-color);
        }

        .product-display .product-display-table th {
            padding: 1rem;
            font-size: 2rem;
        }


        .product-display .product-display-table td {
            padding: 1rem;
            font-size: 2rem;
            border-bottom: var(--border);
        }

        .product-display .product-display-table .btn:first-child {
            margin-top: 0;
        }

        .product-display .product-display-table .btn:last-child {
            background: crimson;
        }

        .product-display .product-display-table .btn:last-child:hover {
            background: var(--black);
        }
        @media (max-width:991px) {

            html {
                font-size: 55%;
            }

        }

        @media (max-width:768px) {

            .product-display {
                overflow-y: scroll;
            }

            .product-display .product-display-table {
                width: 80rem;
            }

        }

        @media (max-width:450px) {

            html {
                font-size: 50%;
            }

        }
    </style>

    <div class="container" style="margin-top:125px;">
    <?php if (isset($_GET['msg'])): ?>
    <?php if ($_GET['msg'] === 'banned'): ?>
        <div class="alert alert-success" role="alert">
            User has been banned successfully.
        </div>
    <?php elseif ($_GET['msg'] === 'unbanned'): ?>
        <div class="alert alert-success" role="alert">
            User has been unbanned successfully.
        </div>
    <?php elseif ($_GET['msg'] === 'delete'): ?>
        <div class="alert alert-success" role="alert">
            ACCOUNT HAS BEEN SUCCESSFULLY DELETED.
        </div>
    <?php endif; ?>
<?php endif; ?>
        
        <h1><strong>MEMBER MANAGEMENT<strong></h1>
        <div class="product-display">
            <table class="product-display-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Member name</th>
                        <th>role</th>
                        <th>Number of post</th>
                        <th>Status</th>
                        <th>action</th>
                    </tr>
                </thead>
                <?php $account=array_slice($posts,1); foreach ($account as $post): ?>
                    <tr>
                        <td>
                            <?php echo $post['id_user']; ?>
                        </td>
                        <td>
                            <?php echo $post['user_name']; ?>
                        </td>
                        <td>
                            <?php if ($post['user_role'] == 2): ?>
                                normal user
                            <?php elseif ($post['user_role'] == 3): ?>
                                artist
                            <?php else: ?>
                                admin
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php echo $post['album_count']; ?>
                        </td>
                        <td>
                            <?php if ($post['status_user'] == 1): ?>
                                <span class="badge bg-danger">BANNED</span>
                            <?php else: ?>
                                <span class="badge bg-success">ACTIVE</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <form method="POST" action="<?php echo ROOT; ?>banned">
                                <input type="hidden" name="user_id" value="<?php echo $post['id_user']; ?>">
                                <input type="hidden" name="status" value="<?php echo $post['status_user']; ?>">
                                <?php if ($post['status_user'] == 1): ?>
                                    <button type="submit" class="btn"><i class="fas fa-edit"></i>UNBANNED
                                    </button>
                                <?php else: ?>
                                    <button type="submit" class="btn"><i class="fas fa-edit"></i>BANNED
                                    </button>
                                <?php endif; ?>
                            </form>
                            <form method="POST" action="delete">
                                <input type="hidden" name="user_id" value="<?php echo $post['id_user']; ?>">
                                <button type="submit" class="btn"><i class="fas fa-trash"></i> delete</button>
                            </form>

                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>

    </div>


<?php else: ?>
    <style>
        .person-image {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin-right: 20px;
            background-color: #ccc;
        }

        .person-details {
            flex: 1;
        }

        .person-name {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .person-description {
            font-size: 16px;
            color: #888;
            margin-bottom: 20px;
        }

        .person-social {
            display: flex;
            gap: 10px;
        }

        .person-social a {
            display: inline-block;
            width: 30px;
            height: 30px;
            background-color: #ccc;
            text-align: center;
            line-height: 30px;
            border-radius: 50%;
            color: #fff;
            text-decoration: none;
        }



        .card-body {
            flex-direction: column;
            height: 100%;
            justify-content: space-between;
        }

        .card.d-flex {
            height: 100% !important;
        }
    </style>
    <div class="container mt-5" style="display: flex; display: flex; flex-direction: column; padding: 180px 0 170px 0; ">x
        <div class="container " style="  background-color: #535353; border: black solid 6px; margin-bottom: 34px top:-57px; top: -123px;
    position: relative;
    padding-bottom: 22px">
            <div class="person" style="display:flex; flex-direction:row;">
                <div class="person-image">
                    <!-- Add user's profile image here -->
                    <img width="190px"
                        src="data:image/png;base64,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"
                        alt="">
                </div>
                <div class="person-details">
                    <h2 class="person-name">
                        <?php echo $_SESSION['user_name']; ?>
                    </h2>
                    <p class="person-description">
                        <?php
                        if ($_SESSION['user_role'] == 3) {
                            echo "I am an artist";
                        } else {
                            echo "I am a normal user";
                        }
                        ?>
                    </p>
                    <div class="person-social">
                        <a href="#" class="social-icon">FB</a>
                        <a href="#" class="social-icon">TW</a>
                        <a href="#" class="social-icon">IG</a>
                    </div>

                    <div class="person follower"
                        style="display: flex; flex-direction:row; justify-content:center; align-items:center;">
                        <div class="followed">
                            <h3 class="text-center"><span>0</span></h3>
                            <strong>
                                <h2>FOLLOWED</h2>
                            </strong>
                        </div>
                        /
                        <div class="following">
                            <h3 class="text-center"><span>0</span></h3>
                            <strong>
                                <h2>FOLLOWING</h2>
                            </strong>
                        </div>
                    </div>
                </div>
            </div>
            <br>

        </div>

        <div class="container"
            style=" width:100%; display:flex; flex-direction:column; align-items:center;justify-content:center;">

            <h1 style="font-size:35px">CURRENT UPLOADED ALBUMS </h1>
            <a style="display:flex; flex-direction:column; width:150px;" href="<?php echo ROOT; ?>post/create"
                class="btn btn-primary">Create</a>
        </div>


        <div class="bg-light py-5">
            <div class="container" style="justify-content: center;
    display: flex;
    flex-direction: column;
    aligns-item: center;
    align-items: center;">
                <div class="container">
                    <div class="row" id="row">
                        <?php if (!empty($posts)): ?>
                            <?php $visiblePosts = array_slice($posts, 0, 3);
                            foreach ($visiblePosts as $post): ?>
                                <div class="col-lg-4 col-md-6 mb-4">
                                    <div class="card d-flex " style="border: black solid 2px; border-radius: 22px;">
                                        <img src="<?php echo $post['url_imange_album']; ?>"
                                            style="height:200px; border-radius: 22px;" class="card-img-top" alt="Card Image">
                                        <div class="card-body d-flex">
                                            <h5 class="card-title">
                                                <strong>
                                                    <?php echo $post['album_name']; ?>
                                                </strong>
                                                ----number of songs:
                                                <?php echo $post['numberofsongs']; ?>
                                            </h5>
                                            <p class="card-text">Some quick example text to build on the card title and make up the
                                                bulk
                                                of the card's content.</p>

                                            <div class="row">
                                                <div class="col-6 col-sm-3">
                                                    <a class="btn btn-primary btn-block" style="border-radius:26px; width: 100%;"
                                                        href="<?php echo ROOT . 'albums/get/' . $post['albums_id']; ?>">
                                                        <i class="fa fa-info" aria-hidden="true"></i>
                                                    </a>
                                                </div>
                                                <div class="col-6 col-sm-3">
                                                    <button style="border-radius:26px; width: 100%;" type="submit"
                                                        class="btn btn-success" data-toggle="modal"
                                                        data-target="#updateModal<?php echo $post['albums_id'] ?>"><i
                                                            class="fa fa-plus" aria-hidden="true"></i></button>
                                                </div>
                                                <div class="col-6 col-sm-3">
                                                    <button style="border-radius:26px; width: 100%;" type="submit"
                                                        class="btn btn-success btn-block" data-toggle="modal"
                                                        data-target="#updateALBUMModal<?php echo $post['albums_id']; ?>">
                                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                                <div class="col-6 col-sm-3">
                                                    <form action="<?php echo ROOT . "albums/delete" ?>" method="post"
                                                        class="d-inline">
                                                        <input type="hidden" name="album_id"
                                                            value="<?php echo $post['albums_id']; ?>">
                                                        <button style="border-radius:26px; width: 100%;" type="submit"
                                                            name="delete_album" class="btn btn-danger btn-block">
                                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>



                                            <!-- Rest of your card content -->
                                            <div style="border: solid black 2px ;" class="modal fade"
                                                id="updateModal<?php echo $post['albums_id']; ?>" tabindex="-1" role="dialog"
                                                aria-labelledby="updateModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content" style="border: solid black 2px ;">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="updateModalLabel">Update Song Details</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div id="success-alert" class="alert alert-success fade" role="alert">
                                                            </div>
                                                            <form action="<?php echo ROOT . "songs/create" ?>" method="post"
                                                                enctype="multipart/form-data" id="song-form">

                                                                <input type="hidden" name="albums_ID"
                                                                    value="<?php echo $post['albums_id']; ?>">
                                                                <div class="form-group">
                                                                    <label for="songName">Song Name</label>
                                                                    <input type="text" class="form-control" id="songName"
                                                                        name="songName" placeholder="Enter song name" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="songCover">Song Cover</label>
                                                                    <input type="file" class="form-control-file" id="songCover"
                                                                        name="songCover" accept="image/*">
                                                                </div>
                                                                <button type="submit" name="edit_song" class="btn btn-primary">Save
                                                                    Changes</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="modal fade" id="updateALBUMModal<?php echo $post['albums_id']; ?>"
                                                tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="updateModalLabel">Update albums Details</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div id="success-alert" class="alert alert-success fade" role="alert">
                                                            </div>
                                                            <form action="<?php echo ROOT . "albums/update" ?>" method="post"
                                                                enctype="multipart/form-data" id="song-form">

                                                                <input type="hidden" name="albums_ID"
                                                                    value="<?php echo $post['albums_id']; ?>">
                                                                <div class="form-group">
                                                                    <label for="album_Name">ALBUM Name</label>
                                                                    <input type="text" class="form-control" id="album_Name"
                                                                        name="album_Name" placeholder="Enter album name" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="album_Cover">album's Cover</label>
                                                                    <input type="file" class="form-control-file" id="album_Cover"
                                                                        name="album_Cover" accept="image/*">
                                                                </div>
                                                                <button type="submit" name="edit_albums" onclick="showUpdateAlert()"
                                                                    class="btn btn-primary">Save Changes</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            <?php endforeach; ?>
                        <?php else: ?>
                            <p><strong style="align-items: center;text-align: center;display: flex;">
                                    <h2 class="text-center"> No albums were created.</h2>
                                </strong></p>
                        <?php endif; ?>


                    </div>
                </div>

                <div>
                    <button class="btn btn-outline-primary" id="load-more">load more </button>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>   
<script>
    <?php
    $remainingPosts = array_slice($posts, 0);

    $currentIndex = count($visiblePosts);


    ?>
        $(function () {

            "use strict";

            /* Preloader
            -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */

            setTimeout(function () {
                $('.loader_bg').fadeToggle();
            }, 1500);
        });
        const Row = document.getElementById('row');
        const loadMoreBtn = document.getElementById('load-more');
        const remainingPosts = <?php echo json_encode($remainingPosts); ?>;
        let currentIndex = <?php echo count($visiblePosts); ?>;

        loadMoreBtn.addEventListener('click', function () {
            if (currentIndex < remainingPosts.length) {
                for (let i = currentIndex; i < currentIndex + 3 && i < remainingPosts.length; i++) {
                    let post = remainingPosts[i];
                    const card = document.createElement('div');
                    card.className = 'col-lg-4 col-md-6 mb-4';
                    card.innerHTML = `
                                        <div class="card d-flex" style="border: black solid 2px; border-radius: 22px;">
                                            <img src="${post['url_imange_album']}" style="height:200px; border-radius: 22px;" class="card-img-top" alt="Card Image">
                                            <div class="card-body d-flex">
                                                <h5 class="card-title">
                                                    <strong>${post['album_name']}</strong>
                                                    ----number of songs: ${post['numberofsongs']}
                                                </h5>
                                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                <div class="row">
                                                                        <div class="col-6 col-sm-3">
                                                                            <a class="btn btn-primary " style="border-radius:26px; width: 100%;" href="<?php echo ROOT . 'albums/get/' ?>${post['albums_id']}"><i class="fa fa-info" aria-hidden="true"></i></a>
                                                                        </div>
                                                                        <div class="col-6 col-sm-3">
                                                                            <button style="border-radius:26px; width: 100%;" type="submit" class="btn btn-success" data-toggle="modal" data-target="#updateModal${post['albums_id']}"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                                                        </div>
                                                                        <div class="col-6 col-sm-3">
                                                                            <button style="border-radius:26px; width: 100%;" type="submit" class="btn btn-success" data-toggle="modal" data-target="#updateALBUMModal${post['albums_id']}"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                                                                        </div>
                                                                        <div class="col-6 col-sm-3">
                                                                            <button style="border-radius:26px; width: 100%;" type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                                                        </div>
                                                                </div>
                                                <div style="border: solid black 2px ;" class="modal fade"
                                                                id="updateModal${post['albums_id']}" tabindex="-1" role="dialog"
                                                                aria-labelledby="updateModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content" style="border: solid black 2px ;">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="updateModalLabel">Update Song Details</h5>
                                                                            <button type="button" class="close" data-dismiss="modal"
                                                                                aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div id="success-alert" class="alert alert-success fade" role="alert">
                                                                            </div>
                                                                            <form action="<?php echo ROOT . "songs/create" ?>" method="post"
                                                                                enctype="multipart/form-data" id="song-form">

                                                                                <input type="hidden" name="albums_ID"
                                                                                    value="${post['albums_id']} ">
                                                                                <div class="form-group">
                                                                                    <label for="songName">Song Name</label>
                                                                                    <input type="text" class="form-control" id="songName"
                                                                                        name="songName" placeholder="Enter song name" required>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="songCover">Song Cover</label>
                                                                                    <input type="file" class="form-control-file" id="songCover"
                                                                                        name="songCover" accept="image/*">
                                                                                </div>
                                                                                <button type="submit" name="edit_song" class="btn btn-primary">Save
                                                                                    Changes</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="modal fade" id="updateALBUMModal${post['albums_id']}"
                                                                tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="updateModalLabel">Update albums Details</h5>
                                                                            <button type="button" class="close" data-dismiss="modal"
                                                                                aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div id="success-alert" class="alert alert-success fade" role="alert">
                                                                            </div>
                                                                            <form action="<?php echo ROOT . "albums/update" ?>" method="post"
                                                                                enctype="multipart/form-data" id="song-form">

                                                                                <input type="hidden" name="albums_ID"
                                                                                    value="${post['albums_id']}">
                                                                                <div class="form-group">
                                                                                    <label for="album_Name">ALBUM Name</label>
                                                                                    <input type="text" class="form-control" id="album_Name"
                                                                                        name="album_Name" placeholder="Enter album name" required>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="album_Cover">album's Cover</label>
                                                                                    <input type="file" class="form-control-file" id="album_Cover"
                                                                                        name="album_Cover" accept="image/*">
                                                                                </div>
                                                                                <button type="submit" name="edit_albums" onclick="showUpdateAlert()"
                                                                                    class="btn btn-primary">Save Changes</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                <!-- Rest of your card content -->
                                            </div>
                                        </div>
                                    `;

                    Row.appendChild(card);
                }

                currentIndex += 3;

                if (currentIndex >= remainingPosts.length) {
                    loadMoreBtn.style.display = 'none';
                }
            }

        });

        function showLessCards() {
            const cardsToRemove = visibleCards - cardsPerPage;
            for (let i = 0; i < cardsToRemove && Row.lastChild; i++) {
                Row.removeChild(Row.lastChild);
                visibleCards--;
            }

            currentIndex -= cardsToRemove;
            updateButtonVisibility();
        }

        function updateButtonVisibility() {
            if (currentIndex === remainingPosts.length) {
                loadMoreBtn.style.display = 'none';
            } else {
                loadMoreBtn.style.display = 'block';
            }

            if (visibleCards <= cardsPerPage) {
                showLessBtn.style.display = 'none';
            } else {
                showLessBtn.style.display = 'block';
            }
        }
    </script>







<?php include('views/inc/footer.php'); ?>