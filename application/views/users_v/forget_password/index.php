<!DOCTYPE html>
<html lang="tr">
<head>
    <?php $this->load->view("includes/head"); ?>
    <?php $this->load->view("{$viewFolder}/{$subViewFolder}/page_style"); ?>
</head>
<body class="bg-fixed-02">
    <?php $this->load->view("{$viewFolder}/{$subViewFolder}/content"); ?>
    <?php $this->load->view("{$viewFolder}/{$subViewFolder}/page_script"); ?>
</body>
</html>