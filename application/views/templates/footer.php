    </div>
</div>
<script src="<?= base_url('assets') ?>/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets') ?>/js/popper.min.js"></script>
<script src="<?= base_url('assets') ?>/js/bootstrap.min.js"></script>
<script src="<?= base_url('assets') ?>/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="<?= base_url('assets') ?>/fontawesome-free/js/solid.js"></script>
<script src="<?= base_url('assets') ?>/fontawesome-free/js/fontawesome.js"></script>
<script src="<?= base_url('assets') ?>/jquery/style.js"></script>
<script type="text/javascript">
  $(document).ready(function () {
    $("#sidebar").mCustomScrollbar({
      theme: "minimal"
    });

    $('#sidebarCollapse').on('click', function () {
      $('#sidebar, #content').toggleClass('active');
      $('.collapse.in').toggleClass('in');
      $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    });
  });
</script>
</body>
</html>