<script>
var heatmap = h337.create({
  container: domElement
});

heatmap.setData({
  data: [<?= json_encode($data); ?>]
});
<script>