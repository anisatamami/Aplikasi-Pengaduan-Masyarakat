<?=$this->include('Layout/Headermasyarakat');?>
<!-- Awal Konten Aplikasi -->
<main role="main" class="flex-shrink-0">
<div class="container">
<?php 
    if(empty($intro)){
        $this->renderSection('content');
    } else {
        echo $intro;
    }
    ?>
</div>
</main>
<?=$this->include('Layout/Footer');?>