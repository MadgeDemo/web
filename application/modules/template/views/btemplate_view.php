<?= @$this->load->view('bheader_view'); ?>
<?= @$this->load->view('utils/side_bar');?>

<div id="page-wrapper" class="gray-bg">
    <?= @$this->load->view('utils/top_menu');?>
    <?= @$this->load->view($content_view);?>
    <?= @$this->load->view('bfooter_view'); ?>
    </div>
</div>
</body>
</html>
