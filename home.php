<?php
$p = 'Home';
require_once 'assets/inc/header.php';
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="mb-3">
        <!-- blog post button start -->
        <?php if (isset($_SESSION['logged_in'])) : ?>
            <a class="btn btn-primary btn-block" href="#" data-toggle="modal" data-target="#postModal">
                <i class="fas fa-plus fa-sm fa-fw mr-2 text-gray-400"></i>
                Whats on your mind?
            </a>
        <?php else : ?>
            <a class="btn btn-primary btn-block" href="?page=1">
                <i class="fas fa-plus fa-sm fa-fw mr-2 text-gray-400"></i>
                Whats on your mind?
            </a>
        <?php endif; ?>
        <!-- blog post button end -->
    </div>

    <!-- blog post start -->
    <div class="row showAll">
        <div class="col-lg-6">
            <!-- Dropdown Card Example -->
            <div class="card shadow mb-3">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <div>
                        <h6 class="m-0 font-weight-bold text-primary">Dropdown Card Example 2</h6>
                        <h6 class="m-0 p-0">User Name <span class=""> | 15 August 2023</span></h6>
                    </div>

                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="#">Edit</a>
                            <a class="dropdown-item" href="#">Delete</a>
                            <a class="dropdown-item" href="#">Hide</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    Dropdown menus can be placed in the card header in order to extend the functionality
                    of a basic card. In this dropdown card example, the Font Awesome vertical ellipsis
                    icon in the card header can be clicked on in order to toggle a dropdown menu.
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-6">
                            <a href="#" class="btn btn-primary btn-block">
                                <i class="fas fa-thumbs-up fa-sm fa-fw mr-2 text-gray-400"></i>
                                Like
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="#" class="btn btn-primary btn-block">
                                <i class="fas fa-comment fa-sm fa-fw mr-2 text-gray-400"></i>
                                Comment
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <!-- Dropdown Card Example -->
            <div class="card shadow mb-3">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Dropdown Card Example</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink2">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    Dropdown menus can be placed in the card header in order to extend the functionality
                    of a basic card. In this dropdown card example, the Font Awesome vertical ellipsis
                    icon in the card header can be clicked on in order to toggle a dropdown menu.
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <!-- Dropdown Card Example -->
            <div class="card shadow mb-3">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Dropdown Card Example</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink3">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    Dropdown menus can be placed in the card header in order to extend the functionality
                    of a basic card. In this dropdown card example, the Font Awesome vertical ellipsis
                    icon in the card header can be clicked on in order to toggle a dropdown menu.
                </div>
            </div>
        </div>
    </div>
    <!-- blog post end -->


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php require_once 'assets/inc/footer.php'; ?>
<script>
    $(document).ready(function() {
        // see more and see less start
        var showChar = 100;
        var ellipsestext = "...";
        var moretext = "See more";
        var lesstext = "See less";
        $('.more').each(function() {
            var content = $(this).html();
            if (content.length > showChar) {
                var c = content.substr(0, showChar);
                var h = content.substr(showChar, content.length - showChar);
                var html = c + '<span class="moreellipses">' + ellipsestext + '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + lesstext + '</a></span>';
                $(this).html(html);
            }
        });
        $(".morelink").click(function() {
            if ($(this).hasClass("less")) {
                $(this).removeClass("less");
                $(this).html(lesstext);
            } else {
                $(this).addClass("less");
                $(this).html(moretext);
            }
            $(this).parent().prev().toggle();
            $(this).prev().toggle();
            return false;
        });
        // see more and see less end

        // sweet alert start
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        // sweet alert end

        $('#updateBtn').hide();
        $('#title').css('border', '1px solid #5785c9');
        $('#post_content').css('border', '1px solid #5785c9');
        //add record
        $('#addForm').on('submit', function(e) {
            e.preventDefault();
            var title = $('#title').val();
            var post_content = $('#post_content').val();
            // alert(post_content);
            // return;

            //form validation
            if (title == '' && post_content == '') {
                $('#titleError').text('* Title is required');
                $('#title').css('border', '1px solid #f00');
                $('#contentError').text('* Content is required');
                $('#post_content').css('border', '1px solid #f00');
                return;
            } else if (title == '') {
                $('#titleError').text('* Title is required');
                $('#title').css('border', '1px solid #f00');
                $('#contentError').text('');
                $('#post_content').css('border', '1px solid #5785c9');
                return;
            } else if (post_content == '') {
                $('#contentError').text('* Content is required');
                $('#post_content').css('border', '1px solid #f00');
                $('#titleError').text('');
                $('#title').css('border', '1px solid #5785c9');
                return;
            } else if (title.length >= 300 && post_content.length >= 10000) {
                $('#titleError').text('* Title must be less than 300 characters');
                $('#title').css('border', '1px solid #f00');
                $('#contentError').text('* Content must be less than 10000 characters');
                $('#post_content').css('border', '1px solid #f00');
                return;
            } else if (title.length >= 300) {
                $('#titleError').text('* Title must be less than 300 characters');
                $('#title').css('border', '1px solid #f00');
                $('#contentError').text('');
                $('#post_content').css('border', '1px solid #5785c9');
                return;
            } else if (content.length >= 10000) {
                $('#contentError').text('* Content must be less than 10000 characters');
                $('#post_content').css('border', '1px solid #f00');
                $('#titleError').text('');
                $('#title').css('border', '1px solid #5785c9');
                return;
            } else {
                $('#titleError').text('');
                $('#title').css('border', '1px solid #5785c9');
                $('#contentError').text('');
                $('#post_content').css('border', '1px solid #5785c9');
            }

            $.ajax({
                url: 'assets/inc/save.php',
                type: 'POST',
                data: {
                    type: 1,
                    title: title,
                    post_content: post_content
                },
                success: function(data) {
                    // alert(data);
                    if (data == 1) {
                        // modal close after submit
                        $('#postModal').modal('hide');
                        $('#addForm')[0].reset();
                        Toast.fire({
                            icon: 'success',
                            title: 'Record added successfully'
                        })
                        showAll();
                    } else {
                        Toast.fire({
                            icon: 'error',
                            title: 'Something went wrong'
                        })
                    }
                }
            });
        });

        // show all record
        showAll();

        function showAll() {
            $.ajax({
                url: 'assets/inc/save.php',
                type: 'POST',
                data: {
                    type: 2,
                    show: 1
                },
                success: function(data) {
                    $('.showAll').html(data);
                }
            });
        }

        // delete record
        $('body').on('click', '.deleteBtn', function(e) {
            e.preventDefault();
            var check = confirm('Are you sure to delete this record?');
            if (check == false) {
                return;
            }
            var id = $(this).attr('id');
            // alert(id);
            // return;
            $.ajax({
                url: 'assets/inc/save.php',
                type: 'POST',
                data: {
                    type: 3,
                    id: id
                },
                success: function(data) {
                    if (data == 1) {
                        Toast.fire({
                            icon: 'success',
                            title: 'Record deleted successfully'
                        })
                        showAll();
                    } else {
                        Toast.fire({
                            icon: 'error',
                            title: 'Record not deleted'
                        })
                    }
                }
            });
        });

        // edit record
        $('body').on('click', '.editBtn', function() {
            var id = $(this).attr('id');
            // alert(id);
            // return;

            $.ajax({
                type: 'POST',
                url: 'assets/inc/save.php',
                data: {
                    type: 4,
                    id: id
                },
                dataType: 'json',
                success: function(data) {
                    // console.log(data);
                    $('#id').val(data.id);
                    $('#title').val(data.title);
                    $('#post_content').val(data.post_content);
                    $('#saveBtn').hide();
                    $('#updateBtn').show();
                }
            });
        });

        // update record
        $('#updateBtn').on('click', function(e) {
            e.preventDefault();
            $('#id').empty();
            var id = $('#id').val();
            var title = $('#title').val();
            var post_content = $('#post_content').val();
            // alert(id + ' ' + title + ' ' + post_content);
            // return;

            //form validation
            if (title == '' && post_content == '') {
                $('#titleError').text('* Title is required');
                $('#title').css('border', '1px solid #f00');
                $('#contentError').text('* Content is required');
                $('#post_content').css('border', '1px solid #f00');
                return;
            } else if (title == '') {
                $('#titleError').text('* Title is required');
                $('#title').css('border', '1px solid #f00');
                $('#contentError').text('');
                $('#post_content').css('border', '1px solid #5785c9');
                return;
            } else if (post_content == '') {
                $('#contentError').text('* Content is required');
                $('#post_content').css('border', '1px solid #f00');
                $('#titleError').text('');
                $('#title').css('border', '1px solid #5785c9');
                return;
            } else if (title.length >= 300 && post_content.length >= 10000) {
                $('#titleError').text('* Title must be less than 300 characters');
                $('#title').css('border', '1px solid #f00');
                $('#contentError').text('* Content must be less than 10000 characters');
                $('#post_content').css('border', '1px solid #f00');
                return;
            } else if (title.length >= 300) {
                $('#titleError').text('* Title must be less than 300 characters');
                $('#title').css('border', '1px solid #f00');
                $('#contentError').text('');
                $('#post_content').css('border', '1px solid #5785c9');
                return;
            } else if (content.length >= 10000) {
                $('#contentError').text('* Content must be less than 10000 characters');
                $('#post_content').css('border', '1px solid #f00');
                $('#titleError').text('');
                $('#title').css('border', '1px solid #5785c9');
                return;
            } else {
                $('#titleError').text('');
                $('#title').css('border', '1px solid #5785c9');
                $('#contentError').text('');
                $('#post_content').css('border', '1px solid #5785c9');
            }

            $.ajax({
                url: 'assets/inc/save.php',
                type: 'POST',
                data: {
                    type: 5,
                    id: id,
                    title: title,
                    post_content: post_content
                },
                success: function(data) {
                    if (data == 1) {
                        $('#addForm')[0].reset();
                        Toast.fire({
                            icon: 'success',
                            title: 'Record updated successfully'
                        })
                        showAll();
                        $('#saveBtn').show();
                        $('#updateBtn').hide();
                    } else {
                        Toast.fire({
                            icon: 'error',
                            title: 'Record not updated'
                        })
                    }
                }
            });

        });

        //comment button click
        $('body').on('click', '.commentBtn', function() {
            $('#post_id').empty();
            var post_id = $(this).attr('id');
            $('.commentForm' + post_id).toggle();
            // $('.showAllComments' + post_id).toggle();

            $('#comment' + post_id).css('border', '1px solid #5785c9');

            $('#commentForm' + post_id).on('submit', function(e) {
                e.preventDefault();
                var comment = $('#comment' + post_id).val();
                // alert(post_id + ' ' + comment);
                // return;

                //form validation
                if (comment == '') {
                    $('#commentError' + post_id).text('* Comment is required');
                    $('#comment' + post_id).css('border', '1px solid #f00');
                    return;
                } else if (comment.length >= 1000) {
                    $('#commentError' + post_id).text('* Comment must be less than 1000 characters');
                    $('#comment' + post_id).css('border', '1px solid #f00');
                    return;
                } else {
                    $('#commentError' + post_id).text('');
                    $('#comment' + post_id).css('border', '1px solid #5785c9');
                }

                $.ajax({
                    url: 'assets/inc/save.php',
                    type: 'POST',
                    data: {
                        type: 6,
                        post_id: post_id,
                        comment: comment
                    },
                    success: function(data) {
                        if (data == 1) {
                            $('#commentForm' + post_id)[0].reset();
                            Toast.fire({
                                icon: 'success',
                                title: 'Comment added successfully'
                            })
                            showAllComments();
                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: 'Comment not added'
                            })
                        }
                    }
                });
            });
        });

        // show all comments
        showAllComments();

        function showAllComments() {
            $('body').on('click', '.commentBtn', function() {
                var post_id = $(this).attr('id');
                // console.log(post_id);

                $.ajax({
                    url: 'assets/inc/save.php',
                    type: 'POST',
                    data: {
                        type: 7,
                        post_id: post_id
                    },
                    success: function(data) {
                        $('.showAllComments' + post_id).html(data);
                    }
                });
            });
        }

        // delete comment
        $('body').on('click', '.deleteCommentBtn', function(e) {
            e.preventDefault();
            var check = confirm('Are you sure to delete this record?');
            if (check == false) {
                return;
            }
            var id = $(this).attr('id');
            // alert(id);
            // return;

            $.ajax({
                url: 'assets/inc/save.php',
                type: 'POST',
                data: {
                    type: 8,
                    id: id
                },
                success: function(data) {
                    if (data == 1) {
                        Toast.fire({
                            icon: 'success',
                            title: 'Comment deleted successfully'
                        })
                        showAllComments();
                    } else {
                        Toast.fire({
                            icon: 'error',
                            title: 'Comment not deleted'
                        })
                    }
                }
            });
        });
    });
</script>
</body>

</html>