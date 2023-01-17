<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; WoowBlog <?php echo date('Y'); ?></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal start-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="?page=3">Logout</a>
            </div>
        </div>
    </div>
</div>
<!-- Logout Modal end-->

<!-- Post Modal start-->
<div class="modal fade" id="postModal" tabindex="-1" role="dialog" aria-labelledby="postModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="postModalLabel">Whats on your mind?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addForm">
                    <div class="form-group">
                        <input type="hidden" name="id" id="id" value="0">
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control">
                        <span>
                            <p class="text-danger" id="titleError"></p>
                        </span>
                    </div>
                    <div class="form-group mt-3">
                        <label for="post_content">Content</label>
                        <textarea name="post_content" id="post_content" cols="30" rows="5" class="form-control"></textarea>
                        <span>
                            <p class="text-danger" id="contentError"></p>
                        </span>
                    </div>
                    <div class="form-group mt-3 text-center">
                        <button type="submit" class="btn btn-primary" id="saveBtn">Create</button>
                        <button type="button" class="btn btn-primary" id="updateBtn">Update</button>
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Post Modal end-->

<!-- Bootstrap core JavaScript-->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="assets/js/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="assets/js/main.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>