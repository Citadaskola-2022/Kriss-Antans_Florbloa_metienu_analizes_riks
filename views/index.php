

<div style="width: 20px; display: inline-block">x</div>

<div id="goal" style="width: 320px; height: 240px; background: #ccc display: inline-block">
    <div id="marker" style="width: 5px; height: 5px; background: red"; position: relativ > </div>
</div>



<script>
    var marker = document.getElementById('marker');
    document.getElementById('goal').addEventListener('click', function (e){
        marker.style.top = e.clientX + 'px';
        marker.style.top = e.clientX + 'px';
    })
</script>


















<form>


Spēlētāja vārds: <input type="text" name="player_name"><br>
Spēlētāja numurs: <input type="number" name="player_number"><br>
Vai spēlētājs trāpija vārtos:
    <input type="radio" name="goal_status" value="trāpīja"> Trāpīja
    <input type="radio" name="goal_status" value="trāpīja pa vārtusargu"> Trāpīja pa vārtusargu
    <input type="radio" name="goal_status" value="aizmeta garām"> Aizmeta garām<br>
    <input type="submit" value="Saglabāt">
</form>