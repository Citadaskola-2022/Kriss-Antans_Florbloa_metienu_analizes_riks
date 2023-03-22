<?php view('partials/header.view.php') ?>

<?php
/** @var \App\Player[] $players */
?>

<style>
    *  {
        box-sizing: border-box;
        padding: 0;
        margin: 0;
    }

</style>

<div id="goal" style="width: 320px; height: 240px; background: #ccc; position: relative">
    <div id="marker" style="width: 5px; height: 5px; background: red; position: relative;"></div>
</div>

<form method="POST">
    <input id="pos_x" type="hidden" name="pos_x" />
    <input id="pos_y" type="hidden" name="pos_y" />

    <label>Spēlētājs:</label>

    <select name="player_id">
        <?php
        foreach ($players as $player) {
            printf('<option value="%d">%s</option>', $player->id, $player);
        }
        ?>
    </select>

    <input type="submit" value="Saglabāt">
</form>

<script>
    var marker = document.getElementById('marker');

    var scoreX = document.getElementById('pos_x');
    var scoreY = document.getElementById('pos_y');
    document.getElementById('goal').addEventListener('click', function (e) {
        marker.style.top =  e.offsetY + 'px';
        marker.style.left = e.offsetX + 'px';

        scoreX.value = e.offsetY;
        scoreY.value = e.offsetX;
    })
</script>


<?php view('partials/footer.view.php') ?>
