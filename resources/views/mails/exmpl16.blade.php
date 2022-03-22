<p>Salam sejahtera,</p>

<p>Metadata-metadata berikut memerlukan pengesahan:</p>

<?php
$counter = 1;
if(count($metadataTitles) > 0){
    foreach($metadataTitles as $m){
        ?>
        <p><?php echo $counter.') '.$m; ?></p>
        <?php
    }
}

?>

<p>Sila log masuk untuk menyemak dan mengesah metadata. </p>
<p>https://mygeo-explorer.pipe.my/login:</p>

<p>Sekian, terima kasih.</p>