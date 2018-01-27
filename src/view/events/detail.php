<div class="detail-grid">
  <section class="nuttige-info">
    <h3 class="hide">Nuttige Informatie</h3>
    <article class="nuttige-info-article wanneer">
      <h4 class="small-main-title">Wanneer</h4>
      <p><?php echo date('d/m/Y', strtotime($event['start']));?><?php if(date('d/m', strtotime($event['start'])) != date('d/m', strtotime($event['end']))):?> - <?php echo date('d/m/Y', strtotime($event['end']));?><?php endif;?></p>
      <p><?php echo date('H:i', strtotime($event['start']));?> - <?php echo date('H:i', strtotime($event['end']));?></p>
    </article>
    <article class="nuttige-info-article waar">
      <h4 class="small-main-title">Waar</h4>
      <p><?php echo $event['address']; ?></p>
      <p><?php echo $event['postal'];?> <?php echo $event['city'];?></p>
    </article>
    <article class="nuttige-info-article wie">
      <h4 class="small-main-title">Wie</h4>
      <ul>
        <?php foreach($event['organisers'] as $organiser): ?>
        <li><?php echo $organiser['name']; ?></li>
        <?php endforeach; ?>
      </ul>
    </article>
  </section>
  <section class="main-info">
    <h3 class="main-title">Ontdek</h3>
    <?php echo $event['content'] ?>
  </section>
  <section class="practical-info<?php if(!empty($event['practical'])): echo ' show'; endif;?>">
    <h3 class="small-main-title">Praktisch</h3>
    <?php echo $event['practical']; ?>
  </section>
  <section class="other-activities">
    <h3 class="main-title">In de Buurt</h3>
    <div class="activity-grid">
      <?php foreach($similars as $similar): ?>
        <a class="grid-item-link" href="index.php?page=event-detail&amp;id=<?php echo $similar['id'];?>">
          <article class="program-grid-item">
            <picture>
              <img class="grid-image" src="assets/img/ANT1-grid-290w.jpg" alt="<?php echo $similar['title']; ?>">
            </picture>
            <ul class="tags">
              <li class="tag"><?php echo $similar['tags'][1]['tag'];?></li>
              <li class="tag"><?php echo $similar['tags'][2]['tag'];?></li>
              <li class="tag"><?php echo $similar['tags'][3]['tag'];?></li>
            </ul>
            <div class="activity-info">
              <header><h3 class="title"><?php echo $similar['title']; ?></h3></header>
              <p class="time"><?php echo date('d/m', strtotime($similar['start']));?><?php if(date('d/m', strtotime($similar['start'])) != date('d/m', strtotime($similar['end']))):?> - <?php echo date('d/m', strtotime($similar['end']));?> <?php endif;?></p>
              <p class="place"><?php echo $similar['city']; ?></p>
            </div>
          </article>
        </a>
      <?php endforeach;?>
    </div>
  </section>
</div>
