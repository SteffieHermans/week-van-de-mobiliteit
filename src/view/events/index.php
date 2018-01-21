<section>
  <h2>Programma</h2>

  <form class="filter" action="index.php?page=programma" method="post">
    <input class="hide" type="text" name="action" value="action">
    <input type="search" name="tag" placeholder="van alles">
    <select name="day">
      <option value="">een dag</option>
      <option value="2018-09-16">Zondag 16/9</option>
      <option value="2018-09-17">Maandag 17/9</option>
      <option value="2018-09-18">Dinsdag 18/9</option>
      <option value="2018-09-19">Woensdag 19/9</option>
      <option value="2018-09-20">Donderdag 20/9</option>
      <option value="2018-09-21">Vrijdag 21/9</option>
      <option value="2018-09-22">Zaterdag 22/9</option>
    </select>
    <input type="search" name="city" placeholder="een stad">
    <button type="submit">Filter</button>
  </form>

  <div class="activity-grid">
    <?php foreach($events as $event): ?>
      <article>
        <header><h2><?php echo $event['title']; ?></h2></header>
        <dl>
          <dt>code</dt><dd><?php echo $event['code'];?></dd>
          <dt>city</dt><dd><?php echo $event['city'];?></dd>
          <dt>start</dt><dd><?php echo $event['start'];?></dd>
          <dt>end</dt><dd><?php echo $event['end'];?></dd>
          <dt>tags</dt><dd><ul><?php foreach($event['tags'] as $tag): ?><li><?php echo $tag['tag'];?></li><?php endforeach;?></ul></dd>
        </dl>
      </article>
    <? endforeach;?>
  </div>
</section>
